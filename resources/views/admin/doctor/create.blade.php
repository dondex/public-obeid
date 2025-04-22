@extends('layouts.master')

@section('title', 'Add Doctor')

@section('content')

<div class="container-fluid">

    @if(session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <div class="card shadow-sm border-0 rounded-0">

        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <div class="card-header d-sm-flex align-items-center justify-content-between bg-primary text-white">
            <h4 class="mb-0">Add Doctor</h4>
            <a href="{{ url('admin/doctor') }}" class="btn btn-light btn-sm shadow-sm">
                <i class="fas fa-arrow-alt-circle-left text-primary mx-2"></i>Back
            </a>
        </div>
        <div class="card-body">
            <form action="{{ url('admin/add-doctor') }}" method="POST" enctype="multipart/form-data">
                @csrf


                <div class="mb-3">
                    <label for="location_id">Location</label>
                    <select name="location_id" required class="form-control">
                        <option value=""> -- Select Location -- </option>
                        @foreach ($locations as $location)
                            <option value="{{ $location->id }}">{{ $location->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="department_id">Department</label>
                    <select name="department_id" class="form-control" required>
                        @foreach ($departments as $depitem)
                            <option value="{{ $depitem->id }}">{{ $depitem->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="name">Doctor Name</label>
                    <input type="text" name="name" class="form-control" required />
                </div>

                <div class="mb-3">
                    <label for="doctor_title">Doctor Title</label>
                    <input type="text" name="doctor_title" class="form-control" />
                </div>

                <div class="mb-3">
                    <label for="doctor_image">Doctor Image</label>
                    <input type="file" name="doctor_image" class="form-control" accept="image/*" />
                </div>

             

                <div class="mb-3">
                    <label for="available_schedule">Available Schedule</label>
                    <div id="schedule-container">
                        @for ($i = 0; $i < 12; $i++)
                            <div class="schedule-item mb-2">
                                <div>
                                    <label>Month:</label>
                                    <select name="available_schedule[{{ $i }}][month]" class="form-control">
                                        <option value="January">January</option>
                                        <option value="February">February</option>
                                        <option value="March">March</option>
                                        <option value="April">April</option>
                                        <option value="May">May</option>
                                        <option value="June">June</option>
                                        <option value="July">July</option>
                                        <option value="August">August</option>
                                        <option value="September">September</option>
                                        <option value="October">October</option>
                                        <option value="November">November</option>
                                        <option value="December">December</option>
                                    </select>
                                </div>
                                <div>
                                    <label>Days:</label>
                                    <div>
                                        <label class="button-checkbox m-2">
                                            <input type="checkbox" name="available_schedule[{{ $i }}][days][]" value="Monday">
                                            <span>Monday</span>
                                        </label>
                                        <label class="button-checkbox m-2">
                                            <input type="checkbox" name="available_schedule[{{ $i }}][days][]" value="Tuesday">
                                            <span>Tuesday</span>
                                        </label>
                                        <label class="button-checkbox m-2">
                                            <input type="checkbox" name="available_schedule[{{ $i }}][days][]" value="Wednesday">
                                            <span>Wednesday</span>
                                        </label>
                                        <label class="button-checkbox m-2">
                                            <input type="checkbox" name="available_schedule[{{ $i }}][days][]" value="Thursday">
                                            <span>Thursday</span>
                                        </label>
                                        <label class="button-checkbox m-2">
                                            <input type="checkbox" name="available_schedule[{{ $i }}][days][]" value="Friday">
                                            <span>Friday</span>
                                        </label>
                                        <label class="button-checkbox m-2">
                                            <input type="checkbox" name="available_schedule[{{ $i }}][days][]" value="Saturday">
                                            <span>Saturday</span>
                                        </label>
                                        <label class="button-checkbox m-2">
                                            <input type="checkbox" name="available_schedule[{{ $i }}][days][]" value="Sunday">
                                            <span>Sunday</span>
                                        </label>
                                    </div>
                                </div>
                                <div>
                                    <label>Times:</label><br>
                                    @for ($hour = 0; $hour < 24; $hour++)
                                        @php
                                            $timeValue = str_pad($hour, 2, '0', STR_PAD_LEFT) . ':00'; // Only using the hour with 00 minutes
                                            $timeDisplay = ($hour % 12 == 0 ? 12 : $hour % 12) . ':00 ' . ($hour < 12 ? 'AM' : 'PM');
                                        @endphp
                                        <label class="button-checkbox m-2">
                                            <input type="checkbox" name="available_schedule[{{ $i }}][times][]" value="{{ $timeValue }}">
                                            <span>{{ $timeDisplay }}</span>
                                        </label>
                                    @endfor
                                </div>
                            </div>
                            <!-- Divider for each month -->
                            @if ($i < 11) <!-- Avoid adding a divider after the last month -->
                                <hr class="my-4"> <!-- You can customize the class for styling -->
                            @endif
                        @endfor
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>



@endsection
