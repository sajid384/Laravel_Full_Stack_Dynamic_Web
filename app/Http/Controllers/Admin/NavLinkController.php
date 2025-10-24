<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NavLink;
use App\Models\Slider;
use App\Models\Offer;
use App\Models\MenuItem;
use App\Models\About;
use App\Models\Booking;
use App\Models\Feedback;
use App\Models\Client;
use App\Models\Footer;
use Illuminate\Http\Request;

class NavLinkController extends Controller
{
    public function index(Request $request)
    {
        $slides = Slider::all(); // Get all slides from the database

        $offers = Offer::all();

        $category = $request->query('category', 'All');
        $query = MenuItem::where('deleted', 0);

        if ($category !== 'All') {
            $query->where('category', $category);
        }

        $menuItems = $query->get();

        $abouts = About::all();

        $bookings = Booking::all();

        $feedbacks = Feedback::all();

        $clients = Client::all();

        $footer = Footer::first();

        // Fetch nav links from the database sorted by position
        $navLinks = NavLink::where('deleted', 0)
            ->where('is_active', true)
            ->with('children') // Ensure children relationship is loaded
            ->orderBy('position', 'asc') // Sorting by position
            ->get();

        // Get the current URL path
        $currentUrl = request()->path();  

        // Check if the current URL is the root (/) or dashboard (/dashboard)
        if ($currentUrl == 'dashboard') {
            return view('dashboard', compact('navLinks', 'slides', 'offers', 'menuItems', 'category', 'abouts', 'bookings', 'feedbacks', 'clients', 'footer'));
        } else {
            return view('layout', compact('navLinks', 'slides', 'offers', 'menuItems', 'category', 'abouts', 'bookings', 'feedbacks', 'clients', 'footer'));
        }
    }

    // Controller Method for Storing Nav Link
    public function store(Request $request)
    {
        // Validate the form input
        $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'required|string|max:255',
            'view_file' => 'required|string|max:255',  // Make view_file nullable
            'parent_id' => 'nullable|exists:nav_links,id',
        ]);

        $position = NavLink::where('parent_id', $request->parent_id)->max('position') + 1;

        $viewFile = strtolower(str_replace(' ', '_', $request->title. '.blade.php')); // Generate view_file if empty

        // Store the new Nav Link
        NavLink::create([
            'title' => $request->title,
            'url' => $request->url,
            'is_active' => true,
            'view_file' => $viewFile,
            'parent_id' => $request->parent_id,
            'position' => $position, // Assign next position
        ]);

         // Path where the view file should be created
         $viewDir = resource_path('views/components/');
         $viewFilePath = $viewDir . $viewFile;
     
         // Check if the directory exists, if not, create it
         if (!is_dir($viewDir)) {
             mkdir($viewDir, 0755, true);
         }
     
         // Check if the view file doesn't exist and create it
         if (!file_exists($viewFilePath)) {
             file_put_contents($viewFilePath, "@extends('navlayout')\n@section('content')\n<h1>{{ \$navLink->title }} page content</h1>\n@endsection"
             );
         }

        return redirect()->route('dashboard')->with('success', 'Nav link added successfully!');
    }

    public function edit($id)
    {
        $link = NavLink::findOrFail($id);
        return view('admin.navlinks.edit', compact('link'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'url' => 'required|string|max:255',
        'content' => 'required|string', // Add validation for content
        'parent_id' => 'nullable|exists:nav_links,id',
    ]);

    $link = NavLink::findOrFail($id);

    // Manually assign the updated fields
    $link->title = $request->title;
    $link->url = $request->url;
    $link->content = $request->content;
  // Add content field handling
    $link->parent_id = $request->parent_id;

   
    $link->save();

    // Update or create the blade file
    $viewPath = resource_path("views/components/{$link->url}.blade.php");
    if (!file_exists($viewPath)) {
        file_put_contents($viewPath, "@extends('navlayout')\n@section('content')\n<h1>{{ \$link->title }} content preview.</h1>\n<div>{{ !! \$content !! }}</div>\n@endsection");
    }

    return redirect()->route('show.page.editor');
}

    


    public function destroy($id)
    {
        $link = NavLink::findOrFail($id);
        $link->update(['deleted' => 1]); // Soft delete
        return redirect()->route('admin.navlinks.index')->with('success', 'Nav link deleted successfully!');
    }

    public function show()
    {
        $navLinks = NavLink::where('is_active', true)
            ->orderBy('position', 'asc') // Ensure correct order
            ->get();
        return view('home', compact('navLinks'));
    }

    public function reorder(Request $request)
    {
        try {
            $orderData = $request->order;

            foreach ($orderData as $item) {
                NavLink::where('id', $item['id'])->update([
                    'parent_id' => $item['parent_id'],
                    'position' => $item['position'],
                ]);
            }

            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
}
