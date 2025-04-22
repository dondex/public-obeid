@extends('layouts.app')

@section('title', 'Obeid Hospital')

@section('content')

<div class="section-bg pb-5">
    <section>
        <div class="container">
            <div class="row bg-my-appoint row-space row-radius1 ">
                <div class="col-6 ">
                    
                </div>
                
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row ">
            <div class="col-12 p-4">
                <h5>My Appointments</h5>
            </div>   
        </div>
    </div>
    
    @foreach($appointments as $appointment)
    <div class="row m-3 bg-white px-3 py-4 rounded shadow-sm">

        
        
            <!-- <div class="col-md-2 col-sm-1 col-1">
                
                @if($appointment->department && $appointment->department->image)
                    <img src="{{ asset('uploads/department/' . $appointment->department->image) }}" alt="Department Image" class="img-fluid rounded-circle" >
                @else
                    <p>No department image available.</p>
                @endif
                
            </div> -->

            <div class="doctor-card d-flex align-items-start">
                @if($appointment->doctor->doctor_image)
                    <img src="{{ asset($appointment->doctor->doctor_image) }}" class="me-3 rounded-circle" width="40" />
                @else
                    <img src="https://img.icons8.com/color/48/000000/heart-health.png" class="me-3" width="40" />
                @endif
                <div class="flex-grow-1"> <!-- Added flex-grow-1 to allow this div to take available space -->
                    <div class="doctor-name">{{ $appointment->doctor->name }}</div>
                    <div class="text-muted small">
                        {{ $appointment->doctor->doctor_title }}
                    </div>
                    <div class="text-muted small mb-2">{{ $appointment->department->name }}</div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="nearest-tag">
                            @if($appointment->status == 'Pending')
                                <span class="badge bg-success">{{ $appointment->status }}</span>
                            @elseif($appointment->status == 'Accepted')
                                <span class="badge bg-primary">{{ $appointment->status }}</span>
                            @elseif($appointment->status == 'Declined')
                                <span class="badge bg-danger">{{ $appointment->status }}</span>
                            @endif
                        </div>
                        <div class="appointment-time">{{ \Carbon\Carbon::parse($appointment->appointment_time)->format('g:i A') }} - {{ \Carbon\Carbon::parse($appointment->appointment_date_time)->format('d M') }}</div>
                    </div>
                </div>
            </div>



            <!-- <div class="col-md-8 col-8">
                <h4 class="mb-0">{{ $appointment->doctor->name }}</h4>
                <span>{{ $appointment->department->name }}</span>
                <div class="d-flex flex-column py-1">
                    <span>
                        <i class="fas fa-calendar text-primary mr-2"></i>{{ \Carbon\Carbon::parse($appointment->appointment_date_time)->format('l') }} | {{ \Carbon\Carbon::parse($appointment->appointment_date_time)->format('Y-m-d') }}
                    </span>
                    <span>
                        <i class="fas fa-clock text-primary mr-2"></i>{{ \Carbon\Carbon::parse($appointment->appointment_time)->format('g:i A') }}
                    </span>
                </div>
            </div>
            <div class="col-md-2 col-sm-2 col-2">
                @if($appointment->status == 'Pending')
                    <span class="badge bg-success">{{ $appointment->status }}</span>
                @elseif($appointment->status == 'Accepted')
                    <span class="badge bg-primary">{{ $appointment->status }}</span>
                @elseif($appointment->status == 'Declined')
                    <span class="badge bg-danger">{{ $appointment->status }}</span>
                @endif
            </div> -->
       
    </div>
     @endforeach

        
</div>


@endsection