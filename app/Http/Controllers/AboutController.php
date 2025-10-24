<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller {
    
    // ✅ Show all about sections
    public function index() {
        $abouts = About::all();
        return view('admin.about.index', compact('abouts'));
    }

    // ✅ Show form to create new about section
    public function create() {
        return view('admin.about.create');
    }

    // ✅ Store new about section
    public function store(Request $request) {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $imagePath = $request->file('image') ? $request->file('image')->store('about_images', 'public') : null;

        About::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath
        ]);

        return redirect()->route('admin.about.index')->with('success', 'About section added successfully.');
    }

    // ✅ Show edit form
    public function edit($id) {
        $about = About::findOrFail($id);
        return view('admin.about.edit', compact('about'));
    }

    // ✅ Update about section
    public function update(Request $request, $id) {
        $about = About::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('image')) {
            if ($about->image) {
                Storage::delete('public/' . $about->image);
            }
            $imagePath = $request->file('image')->store('about_images', 'public');
        } else {
            $imagePath = $about->image;
        }

        $about->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath
        ]);

        return redirect()->route('admin.about.index')->with('success', 'About section updated successfully.');
    }

    // ✅ Delete about section
    public function destroy($id) {
        $about = About::findOrFail($id);
        
        if ($about->image) {
            Storage::delete('public/' . $about->image);
        }

        $about->delete();

        return redirect()->route('admin.about.index')->with('success', 'About section deleted successfully.');
    }
}

