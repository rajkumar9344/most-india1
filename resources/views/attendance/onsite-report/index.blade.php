@extends('layouts.app')

@section('content')
    <div class="container p-4">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Onsite Report</h2>
            <a href="{{ route('dashboard') }}" class="btn btn-black mb-5">
                <i class="fas fa-home"></i> Home
            </a>
        </div>

        <div class="card">
            <h4>Employee Onsite Details</h4>
            <div class="float-right">

                <a href="#" class="btn btn-primary mb-3 mr-2 float-right">Export</a>
            </div>

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif




            <div class="visibility_search">


            </div>




            <div class="card-body">
                <div class="card-header d-flex">
                    <!-- Column Visibility Toggle Button (Left Corner) -->
                    <div class="dropdown">
                        <!-- Icon button with Font Awesome gear icon -->
                        <a class=" dropdown-toggle" id="columnVisibilityDropdown" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="fas fa-filter"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="columnVisibilityDropdown">

                            <!-- <li><input type="checkbox" class="toggle-column" data-column="0" checked> ID</li> -->
                            <li><input type="checkbox" class="toggle-column" data-column="0" checked><span>Employee ID</span>
                            </li>
                            <li><input type="checkbox" class="toggle-column" data-column="1" checked><span>
                                    Employee Name</span></li>
                            <li><input type="checkbox" class="toggle-column" data-column="2" checked><span>Date</span>
                            </li>

                            <li><input type="checkbox" class="toggle-column" data-column="3" ><span>Work Order Number</span>
                            </li>

                            <li><input type="checkbox" class="toggle-column" data-column="4" ><span>Customer name</span>
                            </li>

                            <li><input type="checkbox" class="toggle-column" data-column="5" ><span>Contact person name</span>
                            </li>

                            <li><input type="checkbox" class="toggle-column" data-column="6" ><span>Contact number</span>
                            </li>

                            <li><input type="checkbox" class="toggle-column" data-column="7" ><span>From time</span>
                            </li>

                            <li><input type="checkbox" class="toggle-column" data-column="8" ><span>To time</span>
                            </li>

                            <li><input type="checkbox" class="toggle-column" data-column="9" ><span>Comment</span>
                            </li>


                    </div>

                    <!-- Search Form (Right Corner) -->
                    <form method="GET" action="{{ route('employees.index') }}" class="form-inline ms-auto"
                        id="searchForm">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" id="table_search" name="table_search" class="form-control float-right"
                                placeholder="Search" value="{{ request('table_search') }}">
                        </div>
                    </form>
                </div>

                <!-- Table to display holidays -->
                <div class="table-responsive"> <!-- Make the table responsive on small screens -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th data-column="0">Employee ID</th>
                                <th data-column="1">Employee Name</th>
                                <th data-column="2">Date</th>
                                <th data-column="3">Work Order number</th>
                                <th data-column="4">Customer name</th>
                                <th data-column="5">Contact person name</th>
                                <th data-column="6">Contact number</th>
                                <th data-column="7">From time</th>
                                <th data-column="8">To time</th>
                                <th data-column="9">Comment</th>


                                <th data-column="10">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                              @include('attendance.onsite-report.partials.onsite_table', [
                                        'onsites' => $onsites,
                                    ])
                        </tbody>
                    </table>
                </div>
            </div>



        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="{{ asset('js/employee-operations.js') }}"></script>
        <script>
             $(document).ready(function() {
            // Function to toggle column visibility
            function toggleColumnVisibility() {
                $('.toggle-column').each(function() {
                    const column = $(this).data('column'); // Get the column index
                    const isChecked = $(this).is(':checked'); // Check if the column is selected

                    // Toggle visibility for both headers and cells
                    $(`th[data-column="${column}"], td[data-column="${column}"]`).toggle(isChecked);
                });
            }

            // Apply initial visibility based on checkbox state
            toggleColumnVisibility();

            // Event listener to toggle column visibility when checkboxes are changed
            $('.toggle-column').on('change', toggleColumnVisibility);

            // Search functionality for selected columns
            $('#table_search').on('input', function() {
                const query = $(this).val(); // Get the search query
                const selectedColumns = [];

                // Get the selected columns
                $('.toggle-column').each(function() {
                    if ($(this).prop('checked')) {
                        selectedColumns.push($(this).data('column')); // Get the column index
                    }
                });

                $.ajax({
                    url: "{{ route('onsite.index') }}", // Laravel route for the index method
                    type: "GET",
                    data: {
                        table_search: query, // Pass the search query
                        selected_columns: selectedColumns // Pass the selected columns
                    },
                    success: function(response) {
                        // Replace the table body with filtered search results
                        $('tbody').html(response);
                        // Reapply column visibility after search
                        toggleColumnVisibility();
                    },
                    error: function(xhr) {
                        console.error("Error fetching employees:", xhr.responseText);
                    }
                });
            });
        });
        </script>
    @endsection
