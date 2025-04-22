<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\AppointmentNotification;
use App\Models\Appointment;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Location;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SetAppointmentController extends Controller
{
    public function create()
    {
        // Get the currently authenticated user
        $user = Auth::user();

        // Check if the user has the role you want (e.g., role_as = '0')
        if (!$user || $user->role_as != '0') {
            return redirect()->back()->with('error', 'Unauthorized access.');
        }

        // Get all departments
        $departments = Department::all();
        $locations = Location::all();

        return view('frontend.appointment.create', compact('departments', 'user', 'locations'));
    }

    public function doctorsByDepartment(Request $request)
    {
        $departmentId = $request->input('department_id');
        $doctors = Doctor::where('department_id', $departmentId)->get();

        return response()->json($doctors);
    }

    public function DepartmentsByLocation(Request $request)
    {
        $locationId = $request->input('location_id');
        $departments = Department::where('location_id', $locationId)->get(); 
        return response()->json($departments);
    }

    public function DoctorSchedule(Request $request)
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
    
        // Send email notification
        Mail::to($appointment->user->email)->send(new AppointmentNotification($appointment));
    
        // Redirect to the appointment creation page with a success message
        return redirect(url('set-appointment/' . Auth::id()))->with('success', 'Appointment Added Successfully');
    }
}
