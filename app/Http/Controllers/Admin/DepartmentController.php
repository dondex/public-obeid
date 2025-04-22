<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DepartmentFormRequest;
use App\Models\Department;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        return view('admin.department.index', compact('departments'));
    }

    public function create()
    {
        $locations = Location::all(); 
        return view('admin.department.create', compact('locations'));
    }

    public function store(DepartmentFormRequest $request)
    {
        $data = $request->validated();

        $department = new Department;

        $department->name = $data['name'];
        $department->icon = $data['icon'];
        $department->description = $data['description'];
        $department->location_id = $data['location_id']; // Save the location ID

        // Handle the image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/department/', $filename);
            $department->image = $filename;
        }

        $department->save();

        return redirect('admin/department')->with('message', 'Department Added Successfully.');
    }

    public function edit($department_id)
    {
        $department = Department::findOrFail($department_id);
        $locations = Location::all(); // Fetch all locations to populate the dropdown
        return view('admin.department.edit', compact('department', 'locations'));
    }

    public function update(DepartmentFormRequest $request, $department_id)
    {
        $data = $request->validated();

        $department = Department::findOrFail($department_id);

        $department->name = $data['name'];
        $department->icon = $data['icon'];
        $department->description = $data['description'];
        $department->location_id = $data['location_id']; // Update the location ID

        // Handle the image upload
        if ($request->hasFile('image')) {
            // Define the destination path for the existing image
            $destination = 'uploads/department/' . ($department->image ?? '');

            // Delete the existing image if it exists
            if (File::exists($destination)) {
                File::delete($destination);
            }

            // Upload the new image
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/department/', $filename);
            $department->image = $filename;
        }

        $department->save(); // Save the updated department

        return redirect('admin/department')->with('message', 'Department Updated Successfully.');
    }

    public function destroy($department_id)
    {
        $department = Department::find($department_id);
        if ($department) {
            $destination = 'uploads/department/' . $department->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $department->delete();
            return redirect('admin/department')->with('message', 'Department Deleted Successfully.');
        } else {
            return redirect('admin/department')->with('message', 'No Department ID Found.');
        }
    }
}