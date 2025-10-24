<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('admin.clients.index', compact('clients'));
    }

    public function create()
    {
        return view('admin.clients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'review' => 'required|string',
            'designation' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $request->file('image') ? $request->file('image')->store('clients', 'public') : null;

        Client::create([
            'name' => $request->name,
            'review' => $request->review,
            'designation' => $request->designation,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.clients.index')->with('success', 'Client Review Added Successfully');
    }

    public function edit($id)
    {
        $client = Client::find($id);
        return view('admin.clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'review' => 'required|string',
            'designation' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($client->image) {
                Storage::disk('public')->delete($client->image);
            }
            $client->image = $request->file('image')->store('clients', 'public');
        }

        $client->update([
            'name' => $request->name,
            'review' => $request->review,
            'designation' => $request->designation,
            'image' => $client->image,
        ]);

        return redirect()->route('admin.clients.index')->with('success', 'Client Review Updated Successfully');
    }

    public function destroy($id)
    {
        Client::findOrFail($id)->delete();

        return redirect()->route('admin.clients.index')->with('success', 'Client Review Deleted Successfully');
    }
}

