<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\User;
use App\Models\Location; // Import the Location model
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::all();
        return view('admin.appointment.index', compact('appointments'));
    }

    public function create()
    {
        $user = User::where('role_as', '0')->get();
        $departments = Department::all();
        $locations = Location::all(); // Fetch all locations

        return view('admin.appointment.create', compact('departments', 'user', 'locations'));
    }

    public function getDepartmentsByLocation(Request $request)
    {
        $locationId = $request->input('location_id');
        $departments = Department::where('location_id', $locationId)->get(); // Fetch departments based on location
        return response()->json($departments);
    }

    public function getDoctorsByDepartment(Request $request)
    {
        $departmentId = $request->input('department_id');
        $doctors = Doctor::where('department_id', $departmentId)->get();

        return response()->json($doctors);
    }

    public function getDoctorSchedule(Request $request)
    {
        $doctor = Doctor::findOrFail($request->doctor_id);
        $available_schedule = json_decode($doctor->available_schedule, true); // Decode the JSON schedule

        return response()->json(['available_schedule' => $available_schedule]);
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'department_id' => 'required|exists:departments,id',
            'doctor_id' => 'required|exists:doctors,id',
            'subject' => 'required|string|max:255',
            'appointment_date_time' => 'required|date',
            'appointment_time' => 'required|string|max:10',
        ]);

        // Convert appointment_time from 12-hour format to 24-hour format
        $appointmentTime = date("H:i", strtotime($request->input('appointment_time')));
        $appointmentDateTime = $request->input('appointment_date_time');

        // Check for existing appointments
        $existingAppointment = Appointment::where('doctor_id', $request->input('doctor_id'))
            ->where('appointment_date_time', $appointmentDateTime)
            ->where('appointment_time', $appointmentTime)
            ->first();

        if ($existingAppointment) {
            return redirect()->back()->withErrors(['error' => 'This appointment time is already booked. Please choose a different time.']);
        }

        // Create a new appointment instance
        $appointment = new Appointment();
        $appointment->user_id = $request->input('user_id');
        $appointment->department_id = $request->input('department_id');
        $appointment->doctor_id = $request->input('doctor_id');
        $appointment->subject = $request->input('subject');
        $appointment->appointment_date_time = $appointmentDateTime;
        $appointment->appointment_time = $appointmentTime; // Use the converted time

        // Save the appointment to the database
        $appointment->save();

        // Redirect to a specific route with a success message
        return redirect('admin/appointments')->with('message', 'Appointment Added Successfully');
    }

    public function edit($appointment_id)
    {
        // Find the appointment by ID
        $appointment = Appointment::findOrFail($appointment_id);

        // Fetch all users, departments, and locations
        $users = User::all();
        $departments = Department::all();
        $locations = Location::all(); // Fetch all locations

        // Fetch doctors based on the department of the current appointment
        $doctors = Doctor::where('department_id', $appointment->department_id)->get();

        return view('admin.appointment.edit', compact('appointment', 'users', 'departments', 'doctors', 'locations'));
    }

    public function update(Request $request, $appointment_id)
    {
        // Validate the incoming request data
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'department_id' => 'required|exists:departments,id',
            'doctor_id' => 'required|exists:doctors,id',
            'subject' => 'required|string|max:255',
            'appointment_date_time' => 'required|date',
            'appointment_time' => 'required|string|max:10',
            'status' => 'required|in:Pending,Accepted,Declined', // Validate status
        ]);
    
        // Find the appointment by ID
        $appointment = Appointment::findOrFail($appointment_id);
    
        // Update the appointment instance with the new data
        $appointment->user_id = $request->input('user_id');
        $appointment->department_id = $request->input('department_id');
        $appointment->doctor_id = $request->input('doctor_id');
        $appointment->subject = $request->input('subject');
        $appointment->appointment_date_time = $request->input('appointment_date_time');
        $appointment->appointment_time = $request->input('appointment_time');
        $appointment->status = $request->input('status'); // Update status
    
        // Save the updated appointment to the database
        $appointment->save();
    
        // Redirect to a specific route with a success message
        return redirect('admin/appointments')->with('message', 'Appointment Updated Successfully');
    }
}