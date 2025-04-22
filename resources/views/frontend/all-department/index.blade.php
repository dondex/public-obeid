@extends('layouts.app')

@section('title', 'Obeid Hospital')

@section('content')

<div class="section-bg">
    <section>
        <div class="container">
            <div class="row bg-img-dept row-space row-radius1 ">
                <div class="col-6 ">
                    <!-- <i class="fas fa-book icon-header"></i> -->
                </div>
                <!-- <div class="col-6 ">
                    <h3 class="text-center">Book Appointment</h3>
                </div> -->
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row ">
            <div class="col-12 p-4">
                <h5>Our Locations and Departments</h5>
            </div>   
        </div>
    </div>

    <div class="row m-3 bg-white px-1 py-4 rounded">
        @foreach($locations as $location)
            @foreach($location->departments as $department) <!-- Assuming you have a relationship defined -->
                <a href="{{ url('department/' . $department->id) }}" class="col-4 text-decoration-none text-dark">
                    <div class="branch-item text-center"> <!-- Center the content -->
                        <img src="{{ asset($location->location_image) }}" alt="{{ $location->name }}" class="branch-img rounded-circle" style="width: 80px; height: 80px;" /> <!-- Adjust size here -->
                        <div class="branch-label">{{ $location->name }}</div> <!-- Use location name instead of hardcoded "Jeddah" -->
                    </div>
                </a>
            @endforeach
        @endforeach 
    </div>

@endsection