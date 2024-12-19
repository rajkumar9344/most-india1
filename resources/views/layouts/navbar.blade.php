<link rel="stylesheet" href="{{ asset('css/custom.css') }}">
<nav class="main-header navbar navbar-expand-lg navbar-color">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <!-- Navbar Toggle Button -->
        <a class="nav-link menu" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>

        <!-- Title -->
        <h5 class="text-font text-center custom-left-space mb-0 flex-grow-1">HR & Payroll Management</h5>

        <!-- Profile Dropdown -->
        <div class="nav-item dropdown">
            <a class="nav-link profile d-flex align-items-center" data-toggle="dropdown" href="#">
                <img src="{{ asset('assets/user.png') }}" class="img-circle elevation-2" alt="User Image" 
                    style="width: 35px; height: 35px;">
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">Profile</span>
                <div class="dropdown-divider"></div>
                <form action="{{ route('logout') }}" method="POST" id="logout-form">
                    @csrf
                    <button type="submit" class="btn btn-danger" style="width: 100%;">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>
