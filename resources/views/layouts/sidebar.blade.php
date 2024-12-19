<link rel="stylesheet" href="{{ asset('css/custom.css') }}">

<aside class="main-sidebar elevation-4" style="position: fixed;overflow: hidden;">
    <a href="#" class="brand-link brand-size bg-white">
        <img src="{{ asset('assets/most.png') }}" alt="Logo" class="  img-size " style="opacity: .8">
        <span class="brand-text  h3 brand-color">MOSTINDIA</span>
    </a>
    <nav class="mt-2 nav-text">
        <ul class="nav  nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item has-treeview menu-open">
                <a href="{{ route('dashboard') }}" class="nav-link active nav-text">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
        </ul>
        <ul class="nav nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('employees.index') }}" class="nav-link nav-text">
                    <i class="nav-icon fas fa-users"></i> <!-- Icon for Employee Master -->
                    <p>Employee </p>

                </a>
            </li>

        </ul>

        <ul class="nav nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Main Attendance Menu -->
          <li class="nav-item has-treeview">
              <a href="#" class="nav-link nav-text">
                  <i class="nav-icon fas fa-calendar-alt"></i> <!-- Icon for Attendance -->
                  <p>
                      Attendance
                      <i class="right fas fa-angle-left"></i> <!-- Arrow indicator for submenu -->
                  </p>
              </a>
              <!-- Submenu -->
              <ul class="nav nav-treeview">
                  <li class="nav-item">
                      <a href="{{ route('attendence.index') }}" class="nav-link nav-text">
                           <!-- Submenu Icon -->
                          <p>Daily Attendance</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('holiday.index') }}" class="nav-link nav-text">
                           <!-- Submenu Icon -->
                          <p>Holiday</p>
                      </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{ route('onsite.index') }}" class="nav-link nav-text">
                         <!-- Submenu Icon -->
                        <p>Onsite Report</p>
                    </a>
                </li>
              </ul>
          </li>
      </ul>
      
    </nav>

</aside>
