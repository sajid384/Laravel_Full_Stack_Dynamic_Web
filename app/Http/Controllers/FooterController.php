<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller {
    public function index() {
        $footer = Footer::first();
        return view('admin.footer.index', compact('footer'));
    }
    
    public function create() {
        return view('admin.footer.create');
    }
    
    public function store(Request $request) {
        $request->validate([
            'location' => 'nullable|string',
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
            'description' => 'nullable|string',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'instagram' => 'nullable|url',
            'pinterest' => 'nullable|url',
            'opening_hours' => 'nullable|string',
        ]);
        Footer::create($request->all());
        return redirect()->route('admin.footer.index')->with('success', 'Footer details added successfully.');
    }
    
    public function edit($id) {
        $footer = Footer::find($id);
        return view('admin.footer.edit', compact('footer'));
    }
    
    public function update(Request $request, Footer $footer) {
        $request->validate([
            'location' => 'nullable|string',
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
            'description' => 'nullable|string',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'instagram' => 'nullable|url',
            'pinterest' => 'nullable|url',
            'opening_hours' => 'nullable|string',
        ]);
        $footer->update($request->all());
        return redirect()->route('admin.footer.index')->with('success', 'Footer details updated successfully.');
    }

    public function destroy($id) {
        Footer::destroy($id);
        return redirect()->route('admin.footer.index')->with('success', 'Footer details deleted successfully.');
    }
}

