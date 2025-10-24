<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;
use Illuminate\Support\Facades\Storage;

class OfferController extends Controller
{
    public function index()
    {
        $offers = Offer::all();

        return view('admin.offers.index', compact('offers'));
    }

    public function create()
    {
        return view('admin.offers.create');
    }


    public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'discount' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('public/offers');  // ✅ Image save ho rahi hai storage/app/public/offers me
        $imageName = str_replace('public/', '', $imagePath); // ✅ Sirf "offers/filename.jpg" save hoga database me
    } else {
        $imageName = null;
    }

    Offer::create([
        'title' => $request->title,
        'discount' => $request->discount,
        'image' => $imageName,  // ✅ Database me sirf "offers/filename.jpg" store hoga
    ]);

    return redirect()->route('offers.index')->with('success', 'Offer added successfully!');

    
    dd($request->all());
}
    public function edit($id)
{
    $offer = Offer::findOrFail($id);
    return view('admin.offers.edit', compact('offer'));
}

public function update(Request $request, $id)
{
    $offer = Offer::findOrFail($id);

    $request->validate([
        'title' => 'required',
        'discount' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if ($request->hasFile('image')) {
        if ($offer->image) {
            Storage::delete('public/' . $offer->image); // ✅ Purani image delete karein
        }
        $imagePath = $request->file('image')->store('public/offers');
        $offer->image = str_replace('public/', '', $imagePath);
    }

    $offer->title = $request->title;
    $offer->discount = $request->discount;
    $offer->save();

    return redirect()->route('offers.index')->with('success', 'Offer updated successfully!');
}

public function destroy($id)
{
    $offer = Offer::findOrFail($id);
    $offer->update(['deleted' => 1]); // Mark as deleted instead of actual deletion

    return redirect()->route('admin.offers.index')->with('success', 'Offer marked as deleted successfully');
}

    
}

