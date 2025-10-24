<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuItem;

class MenuController extends Controller {
    // **Show menu items on frontend**
    public function index(Request $request) {
        $category = $request->query('category', 'All');
        $query = MenuItem::where('deleted', 0);

        if ($category !== 'All') {
            $query->where('category', $category);
        }

        $menuItems = $query->get();
        return view('admin.menu.index', compact('menuItems', 'category'));
    }

    // **Show create menu item page**
    public function create()
    {
        return view('admin.menu.create');
    }

    // **Store new menu item**
    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|max:2048'
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('menu_images', 'public');
        }

        MenuItem::create([
            'name' => $request->name,
            'category' => $request->category,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath
        ]);

        return redirect()->route('admin.menu.index')->with('success', 'Menu item added successfully!');
    }

    // **Edit menu item**
    public function edit($id) {
        $menuItem = MenuItem::findOrFail($id);
        return view('admin.menu.edit', compact('menuItem'));
    }

    // **Update menu item**
    public function update(Request $request, $id) {
        $menuItem = MenuItem::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|max:2048'
        ]);

        $menuItem->update([
            'name' => $request->name,
            'category' => $request->category,
            'description' => $request->description,
            'price' => $request->price
        ]);

        if ($request->hasFile('image')) {
            $menuItem->image = $request->file('image')->store('menu_images', 'public');
            $menuItem->save();
        }

        return redirect()->route('admin.menu.index')->with('success', 'Menu item updated successfully!');
    }

    // **Soft delete menu item**
    public function destroy($id) {
        $menuItem = MenuItem::findOrFail($id);
        $menuItem->update(['deleted' => 1]);

        return redirect()->route('menu.index')->with('success', 'Menu item deleted successfully!');
    }

    // **Restore soft deleted menu item**
    public function restore($id) {
        $menuItem = MenuItem::findOrFail($id);
        $menuItem->update(['deleted' => 0]);

        return redirect()->route('menu.index')->with('success', 'Menu item restored successfully!');
    }
}
