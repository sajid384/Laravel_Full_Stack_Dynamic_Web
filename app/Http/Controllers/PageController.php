<?php

namespace App\Http\Controllers;

use App\Models\NavLink;
use App\Models\Slider;
use App\Models\Footer;
use Illuminate\Http\Request;

class PageController extends Controller
{
    // Show the Page based on the NavLink
    public function showPage(NavLink $navLink, Request $request)
    {
        $navLinks = NavLink::where('deleted', 0)
            ->where('is_active', true)
            ->with('children') // Ensure children relationship is loaded
            ->orderBy('position', 'asc') // Sorting by position
            ->get();
        $slides = Slider::all();
        $footer = Footer::first();
        
        $get_url = $_SERVER["REQUEST_URI"];

        // Fetch the page based on URL
        $page = NavLink::where('url', $get_url)->first();

        if (!$page) {
            abort(404); // If the page is not found, show 404 error
        }

        return view('components.home', compact('page', 'navLinks', 'footer', 'slides'));
    }

    // Show Editor Page for Content Management
    public function showEditorPage()
    {
        $navLinks = NavLink::where('deleted', 0)
            ->where('is_active', true)
            ->with('children') // Ensure children relationship is loaded
            ->orderBy('position', 'asc') // Sorting by position
            ->get(); 
            
        return view('admin.editor', compact('navLinks'));
    }

    // Upload Image and Return URL
    public function uploadImage(Request $request)
    {
        // Validate the image
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);

        // Store the image in the 'images' directory within 'public' storage
        $imagePath = $request->file('image')->store('images', 'public');

        // Return the URL of the image
        return response()->json([
            'url' => asset('storage/' . $imagePath),
        ]);
    }

    // Store the Page Content (HTML)
    public function storePageContent(Request $request)
    {
        $request->validate([
            'nav_link_id' => 'required|exists:nav_links,id',
            'content' => 'required',
        ]);

        // Find the NavLink by ID
        $navLink = NavLink::find($request->nav_link_id);

        // Store raw HTML content (make sure it’s not being escaped or sanitized)
        $navLink->content = $request->content;

        // Save the content
        $navLink->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Content saved successfully.');
    }
}
