<?php


namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        $slides = Slider::all(); // Get all slides from the database
        return view('admin.slider.index', compact('slides'));
    }

    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'bg_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $slider = new Slider();
    $slider->title = $request->title;
    $slider->description = $request->description;
    $slider->button_text = $request->button_text;
    $slider->button_url = $request->button_url;

    if ($request->hasFile('bg_image')) {
        $slider->bg_image = $request->file('bg_image')->store('slider_images', 'public');
    }

    $slider->save();

    return redirect()->route('admin.slider.index')->with('success', 'Slider created successfully.');
}
    
    
    public function edit($id)
    {
        $slide = Slider::findOrFail($id);
        return view('admin.slider.edit', compact('slide'));
    }

    public function update(Request $request, $id)
    {
        // Validate the form input
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'button_text' => 'required|string|max:255',
            'button_url' => 'required|string',
        ]);

        $slide = Slider::findOrFail($id);
        $slide->update($request->all());

        return redirect()->route('admin.slider.index')->with('success', 'Slider updated successfully');
    }

    public function destroy($id)
    {
        $slide = Slider::findOrFail($id);
        $slide->delete();

        return redirect()->route('admin.slider.index')->with('success', 'Slider marked as deleted successfully');
    }
}

