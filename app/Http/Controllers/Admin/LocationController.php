<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; // Import File facade for file handling

class LocationController extends Controller
{
    // Display a listing of the locations
    public function index()
    {
        $locations = Location::all();
        return view('admin.location.index', compact('locations'));
    }

    // Show the form for creating a new location
    public function create()
    {
        return view('admin.location.create');
    }

    // Store a newly created location in storage
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image
        ]);

        $location = new Location();
        $location->name = $request->name;

        // Handle the image upload
        if ($request->hasFile('location_image')) {
            $file = $request->file('location_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/locations/', $filename); // Change the directory as needed
            $location->location_image = 'uploads/locations/' . $filename; // Store the path in the database
        }

        $location->save();

        return redirect('admin/location')->with('message', 'Location Added Successfully.');

    }

    // Show the form for editing the specified location
    public function edit($location_id)
    {
        $location = Location::findOrFail($location_id);
        return view('admin.location.edit', compact('location'));
    }

    // Update the specified location in storage
    public function update(Request $request, $location_id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image
        ]);

        $location = Location::findOrFail($location_id);
        $location->name = $request->name;

        // Handle the image upload
        if ($request->hasFile('location_image')) {
            // Define the destination path for the existing image
            $destination = $location->location_image; // Use the full path directly

            // Delete the existing image if it exists
            if (File::exists(public_path($destination))) {
                File::delete(public_path($destination));
            } else {
                // Log or debug the path to see why it doesn't exist
                \Log::info("File does not exist: " . public_path($destination));
            }

            // Upload the new image
            $file = $request->file('location_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/locations/', $filename);
            $location->location_image = 'uploads/locations/' . $filename; 
        }

        $location->save();

        return redirect('admin/location')->with('message', 'Location Updated Successfully');
       
    }

    // Remove the specified location from storage
    public function destroy($location_id)
    {
        $location = Location::findOrFail($location_id);
        
        // Optionally delete the image file if needed
        if ($location->location_image) {
            File::delete(public_path($location->location_image));
        }

        $location->delete();

        return redirect('admin/location')->with('message', 'Location Deleted Successfully');
       
    }
}