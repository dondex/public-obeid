@extends('layouts.app')

@section('title', 'Obeid Hospital')

@section('content')

<div class="section-bg">
    <section>
        <div class="container">
            <div class="row bg-img-head row-space row-radius1 ">
                <div class="col-6 ">
                    <!-- <i class="fas fa-book icon-header"></i> -->
                </div>
            </div>
        </div>
    </section>

    @if(session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif
           
    <div class="row p-3 mb-5">

        <div class="appointment-form">
            <div class="form-header">
                <h2>Book an Appointment</h2>
                <p><i class="fas fa-calendar-alt"></i> Schedule your visit</p>
            </div>

            <form action="{{ url('/set-appointment/' . $user->id) }}" method="POST">
                @csrf

                <div class="form-group py-1">
                    <label for="">Patient Name</label>
                    <select name="user_id" class="form-control">
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="location_id">Location</label>
                    <select name="location_id" id="location_id" class="form-control">
                        <option value="">Select a location</option>
                        @foreach ($locations as $location)
                            <option value="{{ $location->id }}">{{ $location->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="department_id">Department</label>
                    <select name="department_id" id="department_id" class="form-control">
                        <option value="">Select a department</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="doctor_id">Doctor</label>
                    <select name="doctor_id" id="doctor_id" class="form-control">
                        <option value="">Select a doctor</option>
                    </select>
                </div>

                <div class="mb-3" id="schedule-container" style="display: none;">
                    <label for="">Available Schedule</label>
                    <div id="schedule" class="border p-3"></div>
                </div>

                <div class="mb-3" id="selected-schedule" style="display: none;">
                    <h5>Selected Schedule:</h5>
                    <p id="selected-day"></p>
                    <p id="selected-time"></p>
                </div>

                <!-- Hidden fields to store selected day and time -->
                <input type="hidden" name="appointment_date_time" id="appointment_date_time" />
                <input type="hidden" name="appointment_time" id="appointment_time" />

                <div class="mb-3">
                    <label for="">Subject</label>
                    <input type="text" name="subject" class="form-control" required />
                </div>

                <button type="submit" class="btn btn-primary" id="submit-button" style="display: none;">Submit</button>
            </form>
        </div>
    </div>     
</div>


<!-- Include SweetAlert2 CSS and JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('assets/js/frontend-appointment.js') }}"></script>

<script>
    // SweetAlert for success message
    @if(session('success'))
        Swal.fire({
            title: 'Thank You!',
            text: 'Your appointment has been set successfully.',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    @endif

    // SweetAlert for error messages
    @if($errors->any())
        Swal.fire({
            title: 'Error!',
            text: '{{ $errors->first() }}', // Display the first error message
            icon: 'error',
            confirmButtonText: 'OK'
        });
    @endif
</script>

@endsection