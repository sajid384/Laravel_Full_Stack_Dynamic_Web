<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::all();
        return view('admin.feedbacks.index', compact('feedbacks'));
    }

    // Admin Create New Input Fields
    public function create()
    {
        return view('admin.feedbacks.create');
    }

    // Store New Input Fields (Handled by Admin)
    public function store(Request $request)
{
    $validated = $request->validate([
        'fields' => 'required|array', // Ensure it's an array
        'fields.*.name' => 'required|string',
        'fields.*.placeholder' => 'required|string',
    ]);

    Feedback::create([
        'fields' => json_encode($validated['fields']),
    ]);

    return redirect()->route('admin.feedbacks.index')->with('success', 'Booking fields added successfully');
}

public function edit($id)
{
    $feedback = Feedback::findOrFail($id);
    $fields = json_decode($feedback->fields, true);
    return view('admin.feedbacks.edit', compact('feedback', 'fields'));
}

public function update(Request $request, $id)
{
    $validated = $request->validate([
        'fields' => 'required|array',
        'fields.*.name' => 'required|string',
        'fields.*.placeholder' => 'required|string',
    ]);

    $feedback = Feedback::findOrFail($id);
    $feedback->update([
        'fields' => json_encode($validated['fields']),
    ]);

    return redirect()->route('admin.feedbacks.index')->with('success', 'Feedback fields updated successfully');
}

public function destroy($id)
{
    Feedback::findOrFail($id)->delete();
    return redirect()->route('admin.feedbacks.index')->with('success', 'Feedback fields deleted successfully');
}

    // Show Form with Dynamic Input Fields on Frontend
    public function showForm()
    {
        $feedback = Feedback::latest()->first(); // Get latest booking fields
        $fields = $feedback ? $feedbacks->fields : []; // Default empty if no fields exist
        return view('feedback', compact('fields'));
    }
}
