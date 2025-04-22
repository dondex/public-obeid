
<!-- <footer class="sticky-bottom bg-white p-4" style="border-top: solid 1px #bebebe;">
    <div class="container">
        <div class="row"> 
            <div class="col-12 d-flex flex-row justify-content-between align-items-center">
                <a style="text-decoration: none;" href="{{ url('/') }}">
                    <div class="d-flex flex-column text-center text-gray {{ Request::is('/') ? 'active' : '' }}">
                        <i class="fas fa-home foot-icon"></i>
                        <span class="span-txt">Home</span>
                    </div>
                </a>

                @if(Auth::check())
                    <a style="text-decoration: none;" href="{{ url('medical/' . Auth::id()) }}">
                        <div class="d-flex flex-column text-center text-gray {{ Request::is('medical/*') ? 'active' : '' }}">
                            <i class="fas fa-file-medical foot-icon"></i>
                            <span class="span-txt">Medical file</span>
                        </div>
                    </a>

                    <a style="text-decoration: none;" href="{{ url('my-appointment/' . Auth::id()) }}">
                        <div class="d-flex flex-column text-center text-gray {{ Request::is('my-appointment/*') ? 'active' : '' }}">
                            <i class="fas fa-calendar foot-icon"></i>
                            <span class="span-txt">My Appointments</span>
                        </div>
                    </a>
                @else
                    <a style="text-decoration: none;" href="{{ route('login') }}">
                        <div class="d-flex flex-column text-center text-gray">
                            <i class="fas fa-file-medical foot-icon"></i>
                            <span class="span-txt">Medical file</span>
                        </div>
                    </a>

                    <a style="text-decoration: none;" href="{{ route('login') }}">
                        <div class="d-flex flex-column text-center text-gray">
                            <i class="fas fa-calendar foot-icon"></i>
                            <span class="span-txt">My Appointments</span>
                        </div>
                    </a>
                @endif

                <a style="text-decoration: none;" href="{{ url('departments') }}">
                    <div class="d-flex flex-column text-center text-gray {{ Request::is('departments') ? 'active' : '' }}">
                        <i class="fas fa-hospital foot-icon"></i>
                        <span class="span-txt">Departments</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</footer> -->
<footer>
    <!-- Bottom Navigation -->
    <div class="bottom-nav position-fixed d-flex justify-content-around w-100">
        <a href="{{ url('/') }}" class="text-decoration-none text-dark ">
            <div class="nav-item text-center ">
                <i class="bi bi-house-fill {{ Request::is('/') ? 'active' : '' }}"></i><br><small>Home</small>
            </div>
        </a>

        @if(Auth::check())
            <a href="{{ url('medical/' . Auth::id()) }}" class="text-decoration-none text-muted ">
                <div class="nav-item text-center">
                    <i class="bi bi-folder2 {{ Request::is('medical/*') ? 'active' : '' }}"></i><br><small>Medical File</small>
                </div>
            </a>

            <a href="{{ url('my-appointment/' . Auth::id()) }}" class="text-decoration-none text-muted ">
                <div class="nav-item text-center">
                    <i class="bi bi-calendar-check {{ Request::is('my-appointment/*') ? 'active' : '' }}"></i><br><small>Appointment</small>
                </div>
            </a>
        @else
            <a href="{{ route('login') }}" class="text-decoration-none text-muted">
                <div class="nav-item text-center">
                    <i class="bi bi-folder2"></i><br><small>Medical File</small>
                </div>
            </a>

            <a href="{{ route('login') }}" class="text-decoration-none text-muted">
                <div class="nav-item text-center">
                    <i class="bi bi-calendar-check"></i><br><small>Appointment</small>
                </div>
            </a>
        @endif

        <!-- Center Button -->
        <div class="center-button position-absolute">
            <a href="assistance.html">
                <img src="{{ asset('uploads/call-center-service.png') }}" alt="Consult Button" />
            </a>
        </div>

        <a href="{{ url('lab-result/' . Auth::id()) }}" class="text-decoration-none text-muted">
            <div class="nav-item text-center">
                <i class="bi bi-file-medical {{ Request::is('lab-result/*') ? 'active' : '' }}"></i><br>
                <small>Lab Result</small>
            </div>
        </a>
    </div>
</footer>