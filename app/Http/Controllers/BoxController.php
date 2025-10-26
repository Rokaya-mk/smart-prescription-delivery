<?php

namespace App\Http\Controllers;

use App\Box;
use Illuminate\Http\Request;

class BoxController extends Controller
{
    public function index()
{
    $boxes = Box::latest()->paginate(10);
    return view('admin.boxes.index', compact('boxes'));
}

public function create()
{
    return view('admin.boxes.create');
}

public function store(Request $request)
{
    $validated = $request->validate([
        'location_name' => 'required|max:255',
        'address' => 'required',
        'city' => 'required',
        'postal_code' => 'required',
        'gps_coordinates' => 'nullable',
        'status' => 'required|in:available,in_use,under_maintenance'
    ]);
    
    Box::create($validated);
    return redirect()->route('boxes.index')->with('success', 'Box created successfully');
}

public function show(Box $deliveryBox)
{
    return view('admin.boxes.show', compact('deliveryBox'));
}

public function edit($id)
{
    $deliveryBox = Box ::find($id);
    return view('admin.boxes.edit', compact('deliveryBox'));
}

public function update(Request $request,$id)
{
    $deliveryBox = Box::find($id);
    // dd( $deliveryBox);
    $validated = $request->validate([
       'location_name' => 'required|max:255',
        'address' => 'required',
        'city' => 'required',
        'postal_code' => 'required',
        'gps_coordinates' => 'nullable',
        'status' => 'required|in:available,in_use,under_maintenance'
    ]);
    
    $deliveryBox->update($validated);
    return redirect()->route('boxes.index')->with('success', 'Box updated successfully');
}

public function destroy($id)
{
    $deliveryBox = Box ::find($id);
    $deliveryBox->delete();
    return redirect()->route('boxes.index')->with('success', 'Box deleted successfully');
}
}
