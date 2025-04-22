@extends('layouts.app')

@section('title', 'Obeid Hospital')

@section('content')

<section>
    <div id="main-content" class="pb-5">

        <!-- Logo Section -->
        <div class="logo-section">
        <img src="{{ asset('uploads/obeid-logo.png') }}" alt="Saudi German Health Logo">
        </div>

        <!-- Profile Card -->
        <div class="profile-card">
        <div class="d-flex">

        @if(Auth::check())
            @if($record && $record->profile_image) 
                <img src="{{ asset($record->profile_image) }}" alt="Profile Picture" class="profile-img">
            @else
                <img src="{{ asset('uploads/call-center-service.png') }}" alt="User  Icon" class="profile-img">
            @endif
        @else
            <img src="{{ asset('uploads/call-center-service.png') }}" alt="User  Icon" class="profile-img">
        @endif


            
            <div class="ms-3">
            <h6 class="mb-1">
                @auth
                    Welcome, {{ Auth::user()->name }}!
                @else
                    Welcome, Guest!
                @endauth
            </h6>
            <small>File no. 
                @auth
                    {{ Auth::user()->custom_id }} 
                @else
                    ************ 
                @endauth
            </small>

            <div class="d-flex flex-wrap mt-3 icon-wrapper">
                <div class="text-center">
                <div class="icon-box">
                    <i class="bi bi-cake"></i>
                </div>
                <div class="icon-label">Age</div>
                </div>
                <div class="text-center">
                <div class="icon-box">
                    <i class="bi bi-gender-ambiguous"></i>
                </div>
                <div class="icon-label">Gender</div>
                </div>
                <div class="text-center">
                <div class="icon-box">
                    <i class="bi bi-droplet-half"></i>
                </div>
                <div class="icon-label">Blood</div>
                </div>
                <div class="text-center">
                <div class="icon-box">
                    <i class="bi bi-people-fill"></i>
                </div>
                <div class="icon-label">Family</div>
                </div>
            </div>            
            </div>
        </div>
        <div class="text-end mt-2">
            @if(Auth::check())
                <a href="{{ url('profile/' . Auth::id()) }}" class="text-decoration-none text-dark">View more →</a>
            @else
                <a href="{{ route('login') }}" class="text-decoration-none text-dark">View more →</a>
            @endif
        </div>
        </div>

        <!-- Services -->
        <div class="mx-3">
        <div class="container">
                <div class="row">
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100 rounded-lg shadow-sm" src="{{ asset('uploads/obeid-banner.jpeg') }}" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100 rounded-lg shadow-sm" src="{{ asset('uploads/banner4.jpeg') }}" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100 rounded-lg shadow-sm" src="{{ asset('uploads/banner3.jpeg') }}" alt="Third slide">
                            </div>
                        </div>
                    
                    </div>
                </div>
        </div>

        <div class="row">
            <div class="col-6">
                @if(Auth::check())
                    <a href="{{ url('set-appointment/' . Auth::id()) }}" class="text-decoration-none text-dark">
                        <div class="service-card text-center">
                            <i class="bi bi-calendar-event fs-2 text-success"></i>
                            <h6 class="mt-2">Book appointment</h6>
                            <p class="small text-muted">Easy steps to book your appointment</p>
                        </div>
                    </a>
                @else
                    <a href="{{ route('login') }}" class="text-decoration-none text-dark">
                        <div class="service-card text-center">
                            <i class="bi bi-calendar-event fs-2 text-muted"></i>
                            <h6 class="mt-2">Book appointment</h6>
                            <p class="small text-muted">Easy steps to book your appointment</p>
                        </div>
                    </a>
                @endif
            </div>

            <div class="col-6">
                @if(Auth::check())
                    <a href="{{ url('medical/' . Auth::id()) }}" class="text-decoration-none text-dark">
                        <div class="service-card text-center">
                            <i class="bi bi-file-medical fs-2 text-danger"></i>
                            <h6 class="mt-2">Medical file</h6>
                            <p class="small text-muted">Monitor doctor visits, medication, etc.</p>
                        </div>
                    </a>
                @else
                    <a href="{{ route('login') }}" class="text-decoration-none text-dark">
                        <div class="service-card text-center">
                            <i class="bi bi-file-medical fs-2 text-muted"></i>
                            <h6 class="mt-2">Medical file</h6>
                            <p class="small text-muted">Monitor doctor visits, medication, etc.</p>
                        </div>
                    </a>
                @endif
            </div>
        </div>
        
        <div class="row">
            <div class="col-6">
                @auth
                    <a href="{{ url('lab-result/' . Auth::id()) }}" class="text-decoration-none text-dark">
                        <div class="service-card text-center position-relative">
                            <i class="bi bi-person-video2 fs-2 text-warning"></i>
                            <h6 class="mt-3">Lab & Radiology Result</h6>
                        </div>
                    </a>
                @else
                    <a href="{{ route('login') }}" class="text-decoration-none text-dark">
                        <div class="service-card text-center position-relative">
                            <i class="bi bi-person-video2 fs-2 text-warning"></i>
                            <h6 class="mt-3">Lab & Radiology Result</h6>
                        </div>
                    </a>
                @endauth
            </div>

            <div class="col-6">
                @if(Auth::check())
                    <a href="{{ url('my-appointment/' . Auth::id()) }}" class="text-decoration-none text-dark">
                        <div class="service-card text-center">
                            <i class="bi bi-clipboard-check fs-2 text-info"></i>
                            <h6 class="mt-2">My approvals</h6>
                        </div>
                    </a>
                @else
                    <a href="{{ route('login') }}" class="text-decoration-none text-dark">
                        <div class="service-card text-center">
                            <i class="bi bi-clipboard-check fs-2 text-muted"></i>
                            <h6 class="mt-2">My approvals</h6>
                            
                        </div>
                    </a>
                @endif
            </div>
        </div>
        
        <!-- NEW SERVICES ADDED -->
        <div class="row">
            <div class="col-6">
            <a href="{{ url('locations') }}" class="text-decoration-none text-dark">
                <div class="service-card text-center">
                <i class="bi bi-person-lines-fill fs-2 text-primary"></i>
                <h6 class="mt-2">Our Locations</h6>
                <p class="small text-muted">Book your online consultation</p>
                </div>
            </a>
            </div>
            <div class="col-6">
            <a href="{{ url('/') }}" class="text-decoration-none text-dark">
                <div class="service-card text-center">
                <span class="badge bg-success position-absolute top-0 start-50 translate-middle">Coming soon</span>
                <i class="bi bi-credit-card fs-2 text-primary"></i>
                <h6 class="mt-2">Online Payment</h6>
                <p class="small text-muted">Easily pay your medical bills online</p>
                </div>
            </a>
            </div>
        </div>
        </div>
    </div>
</section>


@endsection