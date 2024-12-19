@extends('layouts.app')

@section('content')
<div class="container p-4">
    <div class="d-flex justify-content-between align-items-center">
        <h2>Employee</h2>
        <a href="{{ url('home') }}" class="btn btn-black mb-5">
            <i class="fas fa-home"></i> Home
        </a>
    </div>
    {{-- <a href="#" class="btn btn-primary mb-3  float-right" data-bs-toggle="modal" data-bs-target="#exportModal">Export</a> --}}
    {{-- <-- Export button popup --> --}}
    <button type="button" class="btn btn-primary mb-3  float-right" data-bs-toggle="modal"
        data-bs-target="#exportModal">
        Export
    </button>
    <!-- Export Modal -->
    <div class="modal fade" id="exportModal" tabindex="-1" aria-labelledby="exportModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exportModalLabel">Export Options</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Select a format to export the employee data:</p>
                    <div class="d-grid gap-2">
                        <a href="{{ route('employees.export.excel') }}" class="btn btn-success">Export to Excel</a>
                        <a href="{{ route('employees.export.csv') }}" class="btn btn-primary">Export to CSV</a>
                        <a href="#" id="exportToPDF" class="btn btn-danger">Export to PDF</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="{{ route('employees.create') }}" class="btn btn-primary mb-3 mr-2 float-right">Create Employee</a>

    <!-- Display success message -->
    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    <script>
    setTimeout(function() {
        $('.alert').fadeOut('fast');
    }, 2000);
    </script>
    @endif

    <!-- Employee List Table -->
    <div class="row table-css">
        <div class="col-12 ">
            <div class="card ">
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
                            <li><input type="checkbox" class="toggle-column" data-column="0" checked><span>ID</span></li>
                            <li><input type="checkbox" class="toggle-column" data-column="1" checked><span>First Name</span></li>
                            <li><input type="checkbox" class="toggle-column" data-column="2" ><span>Last Name</span></li>
                            <li><input type="checkbox" class="toggle-column" data-column="3" ><span>Gender</span></li>
                            <li><input type="checkbox" class="toggle-column" data-column="4" ><span>Date of Birth</span></li>
                            <li><input type="checkbox" class="toggle-column" data-column="5" ><span>Residential Address</span></li>
                            <li><input type="checkbox" class="toggle-column" data-column="6" ><span>Pin Code</span></li>
                            <li><input type="checkbox" class="toggle-column" data-column="7" ><span>City</span></li>
                            <li><input type="checkbox" class="toggle-column" data-column="8" ><span>Country</span></li>
                            <li><input type="checkbox" class="toggle-column" data-column="9" ><span>State</span></li>
                            <li><input type="checkbox" class="toggle-column" data-column="10" ><span>Permanent Address</span></li>
                            {{-- <li><input type="checkbox" class="toggle-column" data-column="11" checked><span>Photo</span></li> --}}
                            <li><input type="checkbox" class="toggle-column" data-column="12" ><span>Emergency Contact Address</span></li>
                            <li><input type="checkbox" class="toggle-column" data-column="13" ><span>Emergency Contact Name</span></li>
                            <li><input type="checkbox" class="toggle-column" data-column="14" ><span>Emergency Contact Number</span></li>
                            <li><input type="checkbox" class="toggle-column" data-column="15" ><span>Blood Group</span></li>
                            <li><input type="checkbox" class="toggle-column" data-column="16" ><span>Mobile 1</span></li>
                            <li><input type="checkbox" class="toggle-column" data-column="17" ><span>Mobile 2</span></li>
                            <li><input type="checkbox" class="toggle-column" data-column="18" checked><span>Personal Email</span></li>
                            <li><input type="checkbox" class="toggle-column" data-column="19" ><span>Employee ID</span></li>
                            <li><input type="checkbox" class="toggle-column" data-column="20" checked><span>Department</span></li>
                            <li><input type="checkbox" class="toggle-column" data-column="21" checked><span>Designation</span></li>
                            <li><input type="checkbox" class="toggle-column" data-column="22" ><span>Date of Joining</span></li>
                            <li><input type="checkbox" class="toggle-column" data-column="23" ><span>Date of Exit</span></li>
                            <li><input type="checkbox" class="toggle-column" data-column="25" ><span>Official Email</span></li>
                            <li><input type="checkbox" class="toggle-column" data-column="26" ><span>Account Holder Name</span></li>
                            <li><input type="checkbox" class="toggle-column" data-column="27" ><span>Account Number</span></li>
                            <li><input type="checkbox" class="toggle-column" data-column="28" ><span>Bank Name</span></li>
                            <li><input type="checkbox" class="toggle-column" data-column="29" ><span>Branch</span></li>
                            <li><input type="checkbox" class="toggle-column" data-column="30" ><span>IFSC Code</span></li>
                            <li><input type="checkbox" class="toggle-column" data-column="31" ><span>Insurance Number</span></li>
                            <li><input type="checkbox" class="toggle-column" data-column="32" ><span>Insurance Start Date</span></li>
                            <li><input type="checkbox" class="toggle-column" data-column="33" ><span>Insurance End Date</span></li>
                            <li><input type="checkbox" class="toggle-column" data-column="34" ><span>Insurance Company Name</span></li>
                            <li><input type="checkbox" class="toggle-column" data-column="35" ><span>Insurance Coverage</span></li>
                        
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


                <div class="card-body table-responsive p-0 " style="height: 300px;">
                    <table class="table table-head-fixed">
                        <thead>
                            <tr>
                                <th data-column="0">ID</th>
                                <th data-column="1">First Name</th>
                                <th data-column="2">Last Name</th>
                                <th data-column="3">Gender</th>
                                <th data-column="4">Date of Birth</th>
                                <th data-column="5">Residential Address</th>
                                <th data-column="6">Pin Code</th>
                                <th data-column="7">City</th>
                                <th data-column="8">Country</th>
                                <th data-column="9">State</th>
                                <th data-column="10">Permanent Address</th>
                                {{-- <th data-column="11">Photo</th> --}}
                                <th data-column="12">Emergency Contact Address</th>
                                <th data-column="13">Emergency Contact Name</th>
                                <th data-column="14">Emergency Contact Number</th>
                                <th data-column="15">Blood Group</th>
                                <th data-column="16">Mobile 1</th>
                                <th data-column="17">Mobile 2</th>
                                <th data-column="18">Personal Email</th>
                                <th data-column="19">Employee ID</th>
                                <th data-column="20">Department</th>
                                <th data-column="21">Designation</th>
                                <th data-column="22">Date of Joining</th>
                                <th data-column="23">Date of Exit</th>
                                <th data-column="25">Official Email</th>
                                <th data-column="26">Account Holder Name</th>
                                <th data-column="27">Account Number</th>
                                <th data-column="28">Bank Name</th>
                                <th data-column="29">Branch</th>
                                <th data-column="30">IFSC Code</th>
                                <th data-column="31">Insurance Number</th>
                                <th data-column="32">Insurance Start Date</th>
                                <th data-column="33">Insurance End Date</th>
                                <th data-column="34">Insurance Company Name</th>
                                <th data-column="35">Insurance Coverage</th>
                           
                                
                                <th data-column="50">Status</th>
                                <th data-column="51">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @include('employee.partials.employee_table', ['employees' => $employees])
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
    // Function to toggle column visibility
    function toggleColumnVisibility() {
        $('.toggle-column').each(function () {
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
            url: "{{ route('employees.index') }}", // Laravel route for the index method
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

<script>
    
$(document).ready(function () {
    // Function to toggle column visibility
    function toggleColumnVisibility() {
        $('.toggle-column').each(function () {
            const column = $(this).data('column'); // Get the column index
            const isChecked = $(this).is(':checked'); // Check if the column is selected

            // Toggle the visibility of the corresponding table headers and data cells
            $(`th[data-column="${column}"], td[data-column="${column}"]`).toggle(isChecked);
        });
    }

    // Apply initial visibility based on checkbox state
    toggleColumnVisibility();

    // Event listener to toggle column visibility when checkboxes are changed
    $('.toggle-column').on('change', toggleColumnVisibility);

    // Export to PDF functionality
    $('#exportToPDF').on('click', function (event) {
        event.preventDefault();

        const visibleColumns = [];

        // Collect visible column names
        $('.toggle-column').each(function () {
            if ($(this).is(':checked')) {
                const columnName = $(this).siblings('span').text().trim(); // Get the column name from sibling span
                if (columnName) {
                    visibleColumns.push(columnName);
                }
            }
        });

        if (visibleColumns.length === 0) {
            alert('Please select at least one column to export.');
            return;
        }

        // Construct the export URL
        const exportUrl = "{{ route('employees.export.pdf') }}?columns=" + encodeURIComponent(visibleColumns.join(','));

        // Redirect to the export URL
        window.location.href = exportUrl;
    });
});


</script>
@endsection