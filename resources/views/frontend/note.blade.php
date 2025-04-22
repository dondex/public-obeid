@extends('layouts.app')

@section('title', 'Obeid Hospital')

@section('content')

<section>
        <div class="container">
            <div class="row bg-home row-space row-radius">
                <div class="col-md-12 ">
                    
                    <img width="300px" height="300px" class="img-fluid " src="{{ asset('uploads/obeid-logo.png') }}" alt="">
                </div>
            </div>
        </div>
</section>

<section>
        <div class="container">
            <div style="margin-top: -10%;" class="row p-4 bg-white rounded shadow-box mx-3">
                <div class="col-md-12">
                    <!-- <h6 class="text-black">Hello,</h6> -->
                    <h4 class="text-black">
                        @auth
                            Welcome, {{ Auth::user()->name }}!
                        @else
                            Welcome, Guest!
                        @endauth
                    </h4>
                    <span class="span-txt">Patient Number:  
                        @auth
                            {{ Auth::user()->custom_id }} <!-- Display the user ID -->
                        @else
                            ************ <!-- Placeholder for guests -->
                        @endauth
                    </span>
                    <div class="row mt-1 mx-0 p-0">
                        <div class="col-md-3 col-3 p-0 m-0">
                            <i class="fas fa-calendar-alt text-darkblue"></i> <!-- Birthday -->
                            <span class="span-txt">Birthday</span>
                            
                        </div>
                        <div class="col-md-3 col-3 p-0 m-0">
                            <i class="fas fa-venus-mars text-darkblue"></i> <!-- Gender -->
                            <span class="span-txt">Gender</span>
                            
                        </div>
                        <div class="col-md-3 col-3 p-0 m-0">
                            <i class="fas fa-user-clock text-darkblue"></i> <!-- Age -->
                            <span class="span-txt">Age</span>
                            
                        </div>
                        <div class="col-md-3 col-3 p-0 m-0">
                            <i class="fas fa-tachometer-alt text-darkblue"></i> <!-- Blood Pressure -->
                            <span class="span-txt">BP</span>
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-12 d-flex justify-content-end mt-3">
                    @if(Auth::check())
                        <a style="text-decoration: none; color: #000;" href="{{ url('profile/' . Auth::id()) }}">
                            <span class="span-txt">
                                View more<i class="fas fa-arrow-right px-2"></i>
                            </span>
                        </a>
                    @else
                        <a style="text-decoration: none; color: #000;" href="{{ route('login') }}" class="text-black">
                            <span class="span-txt">
                                View more<i class="fas fa-arrow-right px-2"></i>
                            </span>
                        </a>
                    @endif
                </div>
            </div>
        </div>
</section>

<section>
        <div class="container mt-4">
            <div class="row mx-1">
                <div class="col-md-12 col-12 ">
                    <div class="py-4 px-3 rounded shadow-box bg-white" style="position: relative; overflow: hidden;">
                        <div class="p-5">
                            <button class="emergency-button shadow-sm">
                                <i class="fas fa-exclamation-triangle text-white"></i>
                            </button>
                        </div>
                        <!-- <i class="fas fa-exclamation-triangle text-darkblue icon-size pb-2"></i>
                        <h6 class="mb-1">Emergency Button</h6>
                        <span class="span-txt">The Emergency Button enables patients and visitors to quickly alert medical staff for urgent assistance, ensuring rapid response and safety.</span> -->
                        <div class="coming-soon-ribbon">Coming Soon</div>
                            
                    </div>
                </div>

                
            </div>
        </div>
</section>

    <section>
        <div class="container ">
            <div class="row mx-1 my-3">
                <div class="col-md-6 col-6 ">
                    @if(Auth::check())
                        <a style="text-decoration: none; color: #000;" href="{{ url('set-appointment/' . Auth::id()) }}">
                            <div class="py-2 px-3 rounded shadow-box bg-white">
                                <i class="fas fa-book text-darkblue icon-size pb-2"></i>
                                <h6 class="mb-1 h6-txt">Book Appointment</h6>
                                <div class="span-txt">Easy steps to book your appointment</div>
                            </div>
                        </a>
                    @else
                        <a style="text-decoration: none;" class="text-black" href="{{ route('login') }}">
                            <div class="py-2 px-3 rounded shadow-box bg-white">
                                <i class="fas fa-book text-darkblue icon-size pb-2"></i>
                                <h6 class="mb-1 h6-txt">Book Appointment</h6>
                                <div class="span-txt">Easy steps to book your appointment</div>
                            </div>
                        </a>
                    @endif 
                </div>

                <div class="col-md-6 col-6">
                    @if(Auth::check())
                        <a style="text-decoration: none; color: #000;" href="{{ url('medical/' . Auth::id()) }}">
                            <div class="py-2 px-3 rounded shadow-box bg-white">
                                <i class="fas fa-file-medical text-darkblue icon-size pb-2"></i>
                                <h6 class="mb-1 h6-txt">Medical File</h6>
                                <div class="span-txt">Monitor doctor visits medication Etc...</div>
                            </div>
                        </a>
                    @else
                        <a style="text-decoration: none;" class="text-black" href="{{ route('login') }}">
                            <div class="py-2 px-3 rounded shadow-box bg-white">
                                <i class="fas fa-file-medical text-darkblue icon-size pb-2"></i>
                                <h6 class="mb-1 h6-txt">Medical File</h6>
                                <div class="span-txt">Monitor doctor visits medication Etc...</div>
                            </div>
                        </a>
                    @endif
                </div>
            </div>

            <div class="row mx-1 my-3">
                <div class="col-md-6 col-6" >
                    <div class="py-2 px-3 rounded shadow-box bg-white" style="position: relative; overflow: hidden;">
                        <i class="fas fa-comments text-darkblue icon-size pb-2"></i>
                        <h6 class="mb-1 h6-txt">Online Consultation</h6>
                        <div class="span-txt">Book your online video consultation</div>
                        <div class="coming-soon-ribbon">Coming Soon</div>
                    </div>
                    
                </div>

                <div class="col-md-6 col-6">
                    @if(Auth::check())
                        <a style="text-decoration: none; color: #000;" href="{{ url('lab-result/' . Auth::id()) }}">
                            <div class="py-2 px-3 rounded shadow-box bg-white">
                                <i class="fas fa-flask text-darkblue icon-size pb-2"></i>
                                <h6 class="mb-1 h6-txt">Lab result</h6>
                                <div class="span-txt">Access secure lab reports</div>
                            </div>
                        </a>
                    @else
                        <a style="text-decoration: none; color: #000;" class="text-black" href="{{ route('login') }}">
                            <div class="py-2 px-3 rounded shadow-box bg-white">
                                <i class="fas fa-check-circle text-darkblue icon-size pb-2"></i>
                                <h6 class="mb-1 h6-txt">My Approvals</h6>
                                <div class="span-txt">Medication/Tests approval from insurance</div>
                            </div>
                        </a>
                    @endif
                </div>
            </div>

            <div class="row mx-1 my-3">
                <div class="col-md-6 col-6 ">
                    @if(Auth::check())
                        <a style="text-decoration: none; color: #000;" href="{{ url('departments') }}">
                            <div class="py-2 px-3 rounded shadow-box bg-white">
                                <i class="fas fa-hospital text-darkblue icon-size pb-2"></i>
                                <h6 class="mb-1 h6-txt">Our Department</h6>
                                <div class="span-txt">Book your doctor video consultation</div>
                            </div>
                        </a>
                    @else
                        <a style="text-decoration: none; color: #000;" href="{{ route('login') }}">
                            <div class="py-2 px-3 rounded shadow-box bg-white">
                                <i class="fas fa-hospital text-darkblue icon-size pb-2"></i>
                                <h6 class="mb-1 h6-txt">Our Department</h6>
                                <div class="span-txt">Book your doctor video consultation</div>
                            </div>
                        </a>
                    @endif
                    
                </div>

                <div class="col-md-6 col-6 ">
                    <div class="py-2 px-3 rounded shadow-box bg-white"  style="position: relative; overflow: hidden;">
                        <i class="fas fa-credit-card text-darkblue icon-size pb-2"></i>
                        <h6 class="mb-1 h6-txt">Online payment</h6>
                        <div class="span-txt">Easily pay your medical bills online</div>
                        <div class="coming-soon-ribbon">Coming Soon</div>
                    </div>
                </div>
            </div>
        </div>
    </section>


<!-- <div class="container  bg-white">
    <div class="row mt-2 ">

        <div class="col-md-6 col-sm-6 col-6 text-center rounded">
                @if(Auth::check())
                    <a style="text-decoration: none;" class="text-white" href="{{ url('medical/' . Auth::id()) }}">
                        <div class="px-1 py-4 bg-blue rounded-lg">
                            <i class="fas fa-file-medical text-white icon-size pb-2"></i>
                            <h6 class="h6-txt">Medical Files</h6>
                        </div>
                    </a>
                @else
                    <a style="text-decoration: none;" class="text-white" href="{{ route('login') }}">
                        <div class="px-3 py-4 bg-blue rounded-lg">
                            <i class="fas fa-file-medical text-white icon-size pb-2"></i>
                            <h6 class="h6-txt">Medical Files</h6>
                        </div>
                    </a>
                @endif
            </div>

            <div class="col-md-6 col-sm-6 col-6 text-center  rounded  ">
                @if(Auth::check())
                    <a style="text-decoration: none;" class="text-white" href="{{ url('lab-result/' . Auth::id()) }}">
                        <div class="px-3 py-4 bg-blue rounded-lg">
                            <i class="fas fa-flask text-white icon-size pb-2"></i>
                            <h6 class="h6-txt">Lab & Radiology Result</h6>
                        </div>
                    </a>
                @else
                    <a style="text-decoration: none;" class="text-white" href="{{ route('login') }}"> 
                        <div class="px-3 py-4 bg-blue rounded-lg">
                            <i class="fas fa-flask text-white icon-size pb-2"></i>
                            <h6 class="h6-txt">Lab & Radiology Result</h6>
                        </div>
                    </a>
                @endif
                
            </div>

            
        </div>

        <div class="row py-3">  
            <div class="col-md-12 col-sm-12 col-12 text-center rounded">
                    @if(Auth::check())
                        <a style="text-decoration: none;" class="text-white" href="{{ url('set-appointment/' . Auth::id()) }}">
                            <div class="px-1 py-4 bg-blue rounded-lg">
                                <i class="fas fa-calendar text-white icon-size pb-2"></i>
                                <h6 class="h6-txt">Book Appointment</h6>
                            </div>
                        </a>
                    @else
                        <a style="text-decoration: none;" class="text-white" href="{{ route('login') }}"> 
                            <div class="px-3 py-4 bg-blue rounded-lg">
                                <i class="fas fa-calendar text-white icon-size pb-2"></i>
                                <h6 class="h6-txt">Book Appointment</h6>
                            </div>
                        </a>
                    @endif
                </div>
        </div>
</div> -->



<!-- <div class="container">
    <div class="row">
        <div class="col-12 p-0 m-0">
            <img class="banner-style rounded-lg" src="{{asset('uploads/obeid-banner.jpeg') }}" alt="">
        </div>
    </div>
</div> -->



<!-- <div class="container">
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
</div> -->

<!-- <div class="container py-2" id="dept-section">
    <div class="row">
        <div class="py-3">
            <h3 class="blue">Departments</h3>
        </div>

        @foreach($department as $dept)
            <div class="col-md-4 col-sm-4 col-4">
                <div class="p-3 my-2 bg-blue text-center rounded shadow-sm">
                    <a style="text-decoration: none;" class="text-white" href="{{ url('department/' . $dept->id) }}">
                        <i class="{{ $dept->icon }} text-white icon-size-dept pb-2"></i>
                        <h6 class="h6-txt text-white">{{ $dept->name }}</h6>
                    </a>
                    
                   
                </div>
            </div>
        @endforeach

    </div>
</div> -->




@endsection