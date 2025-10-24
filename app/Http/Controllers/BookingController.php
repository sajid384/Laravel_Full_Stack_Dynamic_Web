<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use App\Models\Booking;

class BookingController extends Controller
{
    // Show Admin Input Fields Management Page
    public function index()
    {
        $bookings = Booking::all();
        return view('admin.bookings.index', compact('bookings'));
    }

    // Admin Create New Input Fields
    public function create()
    {
        return view('admin.bookings.create');
    }

    // Store New Input Fields (Handled by Admin)
    public function store(Request $request)
{
    $validated = $request->validate([
        'fields' => 'required|array', // Ensure it's an array
        'fields.*.name' => 'required|string',
        'fields.*.placeholder' => 'required|string',
    ]);

    Booking::create([
        'fields' => json_encode($validated['fields']),
    ]);

    return redirect()->route('admin.bookings.index')->with('success', 'Booking fields added successfully');
}

// Show Edit Page
public function edit($id)
{
    $booking = Booking::findOrFail($id);
    $fields = json_decode($booking->fields, true);
    return view('admin.bookings.edit', compact('booking', 'fields'));
}

// Update Booking Fields
public function update(Request $request, $id)
{
    $validated = $request->validate([
        'fields' => 'required|array',
        'fields.*.name' => 'required|string',
        'fields.*.placeholder' => 'required|string',
    ]);

    $booking = Booking::findOrFail($id);
    $booking->update([
        'fields' => json_encode($validated['fields']),
    ]);

    return redirect()->route('admin.bookings.index')->with('success', 'Booking fields updated successfully');
}

// Delete Booking Fields
public function destroy($id)
{
    $booking = Booking::findOrFail($id);
    $booking->delete();

    return redirect()->route('admin.bookings.index')->with('success', 'Booking fields deleted successfully');
}

    // Show Form with Dynamic Input Fields on Frontend
    public function showForm()
    {
        $booking = Booking::latest()->first(); // Get latest booking fields
        $fields = $booking ? $booking->fields : []; // Default empty if no fields exist
        return view('book', compact('fields'));
    }
}
