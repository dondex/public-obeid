<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Location;
use Illuminate\Http\Request;

class AllDepartmentController extends Controller
{
    public function index()
    {
        // Retrieve all locations with their associated departments
        $locations = Location::with('doctors')->get(); // Assuming you want to get doctors as well

        // Return the view with the location data
        return view('frontend.all-department.index', compact('locations'));
    }
}
