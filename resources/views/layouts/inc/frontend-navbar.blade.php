

<!-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container px-3">
                <div class="d-flex">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                       
                        <i class="fas fa-bars text-black"></i>
                    </button>
                 
                    
                </div>
                <div>
                    <a class="navbar-brand" href="{{ url('/') }}">
                       
                        <img class="img-fluid" width="150px" height="150px"  src="{{asset('uploads/obeid-logo.png') }}" alt="">
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                 
                    <ul class="navbar-nav me-auto">

                    </ul>

                   
                    <ul class="navbar-nav ms-auto">

                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} 
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
</nav> -->

 <!-- Top bar -->
 <div class="top-bar">
    <div>
        <i class="bi bi-list" id="sidebar-toggle" style="font-size: 24px; cursor: pointer;"></i>
    </div>
    <div>
        <!-- <button class="language-btn"><i class="bi bi-translate"></i> العربية</button> -->
        
        @guest
            <a href="{{ route('login') }}" class="btn login-btn">
                <i class="bi bi-person-circle"></i> Login/Sign up
            </a>
        @else
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn login-btn">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </button>
            </form>
        @endguest
    </div>
</div>

  
  <!-- Sidebar -->
  <div id="sidebar-container"></div>


  


  <script>
    document.getElementById('sidebar-toggle').addEventListener('click', function () {
        const container = document.getElementById('sidebar-container');

        if (container.classList.contains('active')) {
            closeSidebar();
        } else {
            fetch('/sidebar') // Update this line to fetch from the new route
            .then(res => res.text())
            .then(data => {
                container.innerHTML = data;
                container.classList.add('active');

                // Attach close logic to logo inside loaded sidebar
                const logo = container.querySelector('.logo'); // Make sure the logo div has class="logo"
                if (logo) {
                    logo.addEventListener('click', closeSidebar);
                }

                // Add event listener to close sidebar when clicking outside
                document.addEventListener('click', handleClickOutside);
            })
            .catch(err => console.error('Sidebar load error:', err));
        }
    });

    function closeSidebar() {
        const container = document.getElementById('sidebar-container');
        container.classList.remove('active');
        container.innerHTML = '';

        // Remove the event listener when closing the sidebar
        document.removeEventListener('click', handleClickOutside);
    }

    function handleClickOutside(event) {
        const container = document.getElementById('sidebar-container');
        const toggleButton = document.getElementById('sidebar-toggle');

        // Check if the click was outside the sidebar and the toggle button
        if (!container.contains(event.target) && !toggleButton.contains(event.target)) {
            closeSidebar();
        }
    }
</script>