<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('admin/dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-hospital-symbol"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Obeid Hospital</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->is('admin/dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('admin/dashboard') }}">
            <i class="fas fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <li class="nav-item {{ request()->is('admin/add-location') || request()->is('admin/location') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLoc"
            aria-expanded="true" aria-controls="collapseLoc">
            <i class="fas fa-map-marker-alt"></i>
            <span>Locations</span>
        </a>
        <div id="collapseLoc" class="collapse {{ request()->is('admin/add-location') || request()->is('admin/location') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Location Components:</h6>
                <a class="collapse-item" href="{{ url('admin/add-location') }}">Add Location</a>
                <a class="collapse-item" href="{{ url('admin/location') }}">View Location</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Department -->
    <li class="nav-item {{ request()->is('admin/add-department') || request()->is('admin/department') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-hospital"></i>
            <span>Department</span>
        </a>
        <div id="collapseTwo" class="collapse {{ request()->is('admin/add-department') || request()->is('admin/department') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Department Components:</h6>
                <a class="collapse-item" href="{{ url('admin/add-department') }}">Add Department</a>
                <a class="collapse-item" href="{{ url('admin/department') }}">View Department</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Doctors -->
    <li class="nav-item {{ request()->is('admin/add-doctor') || request()->is('admin/doctor') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-user-md"></i>
            <span>Doctors</span>
        </a>
        <div id="collapseUtilities" class="collapse {{ request()->is('admin/add-doctor') || request()->is('admin/doctor') ? 'show' : '' }}" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Doctor Components:</h6>
                <a class="collapse-item" href="{{ url('admin/add-doctor') }}">Add Doctors</a>
                <a class="collapse-item" href="{{ url('admin/doctor') }}">View Doctor</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

       <!-- Nav Item - Appointments -->
       <li class="nav-item {{ request()->is('admin/add-appointment') || request()->is('admin/appointments') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-calendar-check"></i>
            <span>Appointments</span>
        </a>
        <div id="collapsePages" class="collapse {{ request()->is('admin/add-appointment') || request()->is('admin/appointments') ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Appointment Components:</h6>
                <a class="collapse-item" href="{{ url('admin/add-appointment') }}">Add Appointment</a>
                <a class="collapse-item" href="{{ url('admin/appointments') }}">View Appointments</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Patient Records -->
    <li class="nav-item {{ request()->is('admin/add-record') || request()->is('admin/records') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRecords"
            aria-expanded="true" aria-controls="collapseRecords">
            <i class="fas fa-file-medical"></i>
            <span>Patient Records</span>
        </a>
        <div id="collapseRecords" class="collapse {{ request()->is('admin/add-record') || request()->is('admin/records') ? 'show' : '' }}" aria-labelledby="headingRecords" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Records Components:</h6>
                <a class="collapse-item" href="{{ url('admin/add-record') }}">Add Records</a>
                <a class="collapse-item" href="{{ url('admin/records') }}">View Records</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Patients -->
    <li class="nav-item {{ request()->is('admin/patients') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePatients"
            aria-expanded="true" aria-controls="collapsePatients">
            <i class="fas fa-user-injured"></i>
            <span>Patients</span>
        </a>
        <div id="collapsePatients" class="collapse {{ request()->is('admin/patients') ? 'show' : '' }}" aria-labelledby="headingPatients" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Patient Components:</h6>
                <a class="collapse-item" href="{{ url('admin/patients') }}">View Patient</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>