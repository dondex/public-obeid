<?php

namespace App\Http\Controllers\Frontend;

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    // Method to show all locations (if needed)
    public function index()
    {
        $locations = Location::all();
        return view('frontend.location.index', compact('locations'));
    }

    // Method to show a single location's details
    public function show($location_id)
    {
        // Retrieve the location by ID
        $location = Location::findOrFail($location_id); // Use findOrFail to handle non-existent IDs

        // Return the view with the location data
        return view('frontend.location.show', compact('location'));
    }
}