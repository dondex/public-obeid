@extends('layouts.master')

@section('title', 'Edit Doctor')

@section('content')

<div class="container-fluid">

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <div class="card shadow-sm border-0 rounded-0">

        <div class="card-header d-sm-flex align-items-center justify-content-between bg-primary text-white">
            <h4 class="mb-0">Edit Doctor</h4>
            <a href="{{ url('admin/doctor') }}" class="btn btn-light btn-sm shadow-sm">
                <i class="fas fa-arrow-alt-circle-left text-primary mx-2"></i>Back
            </a>
        </div>
        <div class="card-body">
            <form action="{{ url('admin/update-doctor/'.$doctor->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')


                <div class="mb-3">
                    <label for="location_id">Location</label>
                    <select name="location_id" required class="form-control">
                        <option value=""> -- Select Location -- </option>
                        @foreach ($locations as $location)
                            <option value="{{ $location->id }}" {{ $doctor->location_id == $location->id ? 'selected' : '' }}>{{ $location->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="department_id">Department</label>
                    <select name="department_id" required class="form-control">
                        <option value=""> -- Select Department -- </option>
                        @foreach ($departments as $depitem)
                            <option value="{{ $depitem->id }}" {{ $doctor->department_id == $depitem->id ? 'selected' : '' }}>{{ $depitem->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="name">Doctor Name</label>
                    <input type="text" name="name" value="{{ $doctor->name }}" class="form-control" required />
                </div>

                <div class="mb-3">
                    <label for="doctor_title">Doctor Title</label>
                    <input type="text" name="doctor_title" value="{{ $doctor->doctor_title }}" class="form-control" />
                </div>

                <div class="mb-3">
                    <label for="doctor_image">Doctor Image</label>
                    <input type="file" name="doctor_image" class="form-control" accept="image/*" />
                    @if($doctor->doctor_image)
                        <img src="{{ asset($doctor->doctor_image) }}" alt="Doctor Image" class="img-thumbnail mt-2" style="max-width: 150px;">
                    @endif
                </div>

                <div class="mb-3">
                    <label for="available_schedule">Available Schedule</label>
                    <div id="schedule-container">
                        @if($doctor->available_schedule)
                            @php
                                $schedules = json_decode($doctor->available_schedule, true);
                            @endphp
                            @foreach($schedules as $index => $schedule)
                                <div class="schedule-item mb-2">
                                    <div>
                                        <label>Month:</label>
                                        <select name="available_schedule[{{ $index }}][month]" class="form-control">
                                            <option value="{{ $schedule['month'] }}">{{ $schedule['month'] }}</option>
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
                                            @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
                                                <label class="button-checkbox m-2">
                                                    <input type="checkbox" name="available_schedule[{{ $index }}][days][]" value="{{ $day }}" {{ isset($schedule['days']) && in_array($day, $schedule['days']) ? 'checked' : '' }}>
                                                    <span>{{ $day }}</span>
                                                </label>
                                            @endforeach
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
                                                <input type="checkbox" name="available_schedule[{{ $index }}][times][]" value="{{ $timeValue }}" {{ isset($schedule['times']) && in_array($timeValue, $schedule['times']) ? 'checked' : '' }}>
                                                <span>{{ $timeDisplay }}</span>
                                            </label>
                                        @endfor
                                    </div>
                                </div>
                                <!-- Divider for each month -->
                                @if (!$loop->last) <!-- Avoid adding a divider after the last month -->
                                    <hr class="my-4"> <!-- You can customize the class for styling -->
                                @endif
                            @endforeach
                        @else
                            <div class="schedule-item mb-2">
                                <div>
                                    <label>Month:</label>
                                    <select name="available_schedule[0][month]" class="form-control">
                                        <option value="">Select Month</option> <!-- Default option -->
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
                                        @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
                                            <label class="button-checkbox m-2">
                                                <input type="checkbox" name="available_schedule[0][days][]" value="{{ $day }}">
                                                <span>{{ $day }}</span>
                                            </label>
                                        @endforeach
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
                                            <input type="checkbox" name="available_schedule[0][times][]" value="{{ $timeValue }}">
                                            <span>{{ $timeDisplay }}</span>
                                        </label>
                                    @endfor
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>

@endsection