<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DoctorFormRequest;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Location; // Import the Location model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::all();
        return view('admin.doctor.index', compact('doctors'));
    }

    public function create()
    {
        $departments = Department::all();
        $locations = Location::all(); // Fetch all locations
        return view('admin.doctor.create', compact('departments', 'locations'));
    }

    public function store(DoctorFormRequest $request)
    {
        $data = $request->validated();
    
        // Filter out empty schedule entries
        $filteredSchedules = array_filter($data['available_schedule'], function ($schedule) {
            return !empty($schedule['days']) && !empty($schedule['times']);
        });
    
        // Create a new Doctor instance
        $doctor = new Doctor;
        $doctor->name = $data['name'];
        $doctor->department_id = $data['department_id'];
        $doctor->location_id = $data['location_id'];
        $doctor->doctor_title = $data['doctor_title'];
    
        // Handle the image upload
        if ($request->hasFile('doctor_image')) {
            $file = $request->file('doctor_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/doctors/', $filename);
            $doctor->doctor_image = 'uploads/doctors/' . $filename; 
        }
    
        // Store the filtered schedules
        $doctor->available_schedule = json_encode(array_values($filteredSchedules)); 
    
        $doctor->save();
    
        return redirect('admin/doctor')->with('message', 'Doctor Added Successfully');
    }

    public function edit($doctor_id)
    {
        $departments = Department::all();
        $locations = Location::all(); // Fetch all locations
        $doctor = Doctor::find($doctor_id);
        return view('admin.doctor.edit', compact('doctor', 'departments', 'locations'));
    }

    public function update(DoctorFormRequest $request, $doctor_id)
    {
        $data = $request->validated();

        $doctor = Doctor::find($doctor_id);
        $doctor->name = $data['name'];
        $doctor->department_id = $data['department_id'];
        $doctor->location_id = $data['location_id'];
        $doctor->doctor_title = $data['doctor_title'];

        // Handle the image upload
        if ($request->hasFile('doctor_image')) {
            // Define the destination path for the existing image
            $destination = $doctor->doctor_image; 

            // Delete the existing image if it exists
            if (File::exists(public_path($destination))) {
                File::delete(public_path($destination));
            } else {
                \Log::info("File does not exist: " . public_path($destination));
            }

            // Upload the new image
            $file = $request->file('doctor_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/doctors/', $filename);
            $doctor->doctor_image = 'uploads/doctors/' . $filename; 
        }

        $doctor->available_schedule = json_encode($data['available_schedule']); 

        $doctor->save(); 

        return redirect('admin/doctor')->with('message', 'Doctor Updated Successfully');
    }

    public function destroy($doctor_id)
    {
        $doctor = Doctor::find($doctor_id);
        $doctor->delete();

        return redirect('admin/doctor')->with('message', 'Doctor Deleted Successfully');
    }
}