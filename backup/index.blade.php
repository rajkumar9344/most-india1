{{-- attendace index page  --}}



@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center ml-3">
            <h2>Employee Attendance</h2>
            <a href="{{ route('dashboard') }}" class="btn btn-black mb-5 mt-3 mr-3">
                <i class="fas fa-home"></i> Home
            </a>
        </div>

        <!-- Filter Section -->
        <div class="card m-4">
            <div class="row">
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
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="department">Department</label>
                        <select name="department" id="department" class="form-control">
                            <option value="All">All</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department }}">{{ $department }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" name="date" id="date" class="form-control" value="{{ date('Y-m-d') }}"
                            required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <button id="getEmployee" class="btn btn-primary btn-block" style="margin-top: 32px;">Get
                            Employees</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Employee Table -->
        <!-- Table is hidden initially -->
        <div id="employeeTableContainer" style="display: none;">

            <div class="table-responsive">
                <div class="card m-4 ">
                    <form action="{{ route('attendence.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="date" id="attendance_date" value="{{ date('Y-m-d') }}">
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Check In</th>
                                            <th>Check Out</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody id="employeeTableBody">
                                        <!-- Dynamic Employee Rows -->
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-center mb-4">
                                <button type="submit" id="submitAttendance" class="btn btn-success  custom-margin">Submit
                                    Attendance</button>
                            </div>

                        </div>
                    </form>

                </div>

            </div>
        </div>

        <!-- Leave Modal -->
        <div id="leaveModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="leaveModalLabel"
            aria-hidden="true">
            <!-- Modal content -->
            <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="leaveModalLabel">Leave Details</h5>

                    </div>
                    <div class="modal-body">
                        <form id="leaveForm">
                            <input type="hidden" id="employeeIdLeave">
                            <div class="form-group">
                                <label for="employeeName">Employee Name <span class="required-asterisk">*</span></label>
                                <input type="text" id="employeeNameLeave" class="form-control" disabled>
                            </div>
                            <div class="form-group">
                                <label for="leaveType">Leave Type <span class="required-asterisk">*</span></label>
                                <select id="leaveType" class="form-control" required>
                                    <option value="CL">Casual Leave (CL)</option>
                                    <option value="EL">Earned Leave (EL)</option>
                                    <option value="LOP">Leave Without Pay (LOP)</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="leaveDate">Date <span class="required-asterisk">*</span></label>
                                <input type="date" id="leaveDate" class="form-control" value="{{ date('Y-m-d') }}"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="leaveReason">Reason for Leave <span class="required-asterisk">*</span></label>
                                <textarea id="leaveReason" class="form-control" rows="3" required></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="saveLeaveDetails">Save Leave</button>
                    </div>
                </div>
            </div>
        </div>

        <!--onsite modal-->
        <div class="modal fade" id="onsitModal" tabindex="-1" role="dialog" aria-labelledby="onsiteModalLabel"
            aria-hidden="true">
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>

            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="onsiteModalLabel">Onsite Details</h5>


                    </div>
                    <div class="modal-body">
                        <form id="onsiteForm">
                            <input type="hidden" id="employeeIdOnsite">
                            <div class="form-group">
                                <label for="employeeName">Employee Name <span class="required-asterisk">*</span></label>
                                <input type="text" id="employeeNameOnsite" class="form-control" disabled>
                            </div>
                            <div class="form-group">
                                <label for="workOrderNumber"> Work Oder No <span
                                        class="required-asterisk">*</span></label>
                                <input type="text" id="workOrderNumber" class="form-control" required>
                                <span id="workOrderNumberError" class="error-message"
                                    style="color: red; font-size: 12px;"></span>


                            </div>
                            <div class="form-group">
                                <label for="customerName">Customer Name <span class="required-asterisk">*</span></label>
                                <input type="text" id="customerName" class="form-control" required>
                                <span id="customerNameError" class="error-message"
                                    style="color: red; font-size: 12px;"></span>
                            </div>
                            <div class="form-group">
                                <label for="contactPersonName">Contact Person Name <span
                                        class="required-asterisk">*</span></label>
                                <input type="text" id="contactPersonName" class="form-control" required>
                                <span id="contactPersonNameError" class="error-message"
                                    style="color: red; font-size: 12px;"></span>

                            </div>
                            <div class="form-group">
                                <label for="contactNumber">Contact No <span class="required-asterisk">*</span></label>
                                <input type="text" id="contactNumber" class="form-control" required>
                                <span id="contactNumberError" class="error-message"
                                    style="color: red; font-size: 12px;"></span>

                            </div>
                            <div class="form-group">
                                <label for="onsite_date">Date <span class="required-asterisk">*</span></label>
                                <input type="date" id="onsite_date" class="form-control" value="{{ date('Y-m-d') }}"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="fromTime"> From Time <span class="required-asterisk">*</span></label>
                                <input type="time" value="09:00" id="fromTime" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="toTime"> To Time <span class="required-asterisk">*</span></label>
                                <input type="time" value="18:00" id="toTime" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="comment">Comment</label>
                                <textarea id="comment" class="form-control" rows="3"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="saveOnsiteDetails">Save Onsite</button>
                    </div>
                </div>
            </div>
        </div>


        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script src="{{ asset('js/employee-operations.js') }}"></script>


        <script>
            function updateStatus(employeeId, status) {
                const dropdown = $(`.status-dropdown[data-employee-id="${employeeId}"]`);
                dropdown.val(status); // Set the desired status
                console.log(`Status for employee ID ${employeeId} updated to: ${status}`);
            }

            document.getElementById('contactNumber').addEventListener('input', function(e) {
                let value = e.target.value;
                const messageElement = document.getElementById('contactNumberError'); // Error message element

                // Remove non-numeric characters
                value = value.replace(/\D/g, '');

                // Limit to 6 digits
                if (value.length > 10) {
                    value = value.slice(0, 10);
                }

                e.target.value = value;

                // Display validation message dynamically
                if (value.length === 0) {
                    messageElement.textContent = "This field is required.";
                } else if (value.length < 10) {
                    messageElement.textContent = "Contact number must be exactly 10 digits.";
                } else {
                    messageElement.textContent = ""; // Clear message when valid
                }
            });

            // Show required message on blur if input is empty
            document.getElementById('contactNumber').addEventListener('blur', function(e) {
                const messageElement = document.getElementById('contactNumberError');
                if (e.target.value.trim() === "") {
                    messageElement.textContent = "This field is required.";
                }
            });



            // Set the max date to today's date to prevent future date selection
            document.getElementById('date').setAttribute('max', new Date().toISOString().split('T')[0]);

            $(document).ready(function() {
                let isLeaveSubmitted = false; // Flag to track form submission
                // let isOnsiteSubmitted = false; // Flag to track form submission
                let isOnsiteSubmitted = true;
                let isProcessingOnsiteSubmission = false;
                const employeeTableBody = $('#employeeTableBody');

                function fetchEmployees(department = 'All', date = $('#date').val()) {
                    $.ajax({
                        url: "{{ route('attendence.getEmployeesByDepartment') }}",
                        method: "GET",
                        data: {
                            department: department,
                            date: date
                        },
                        success: function(response) {
                            const {
                                employees,
                                attendance
                            } = response;

                            employeeTableBody.empty();

                            if (employees.length > 0) {
                                employees.forEach(employee => {
                                    const attendanceRecord = attendance[employee.id] || {};
                                    const checkIn = attendanceRecord.check_in || "09:00";
                                    const checkOut = attendanceRecord.check_out || "18:00";
                                    const status = attendanceRecord.status || "present";

                                    const row = `
                                <tr>
                                    <td>${employee.employee_id}</td>
                                    <td>${employee.first_name} ${employee.last_name}</td>
                                    <td><input type="time" name="check_in[${employee.id}]" value="${checkIn}" class="form-control"></td>
                                    <td><input type="time" name="check_out[${employee.id}]" value="${checkOut}" class="form-control"></td>
                                    <td>
                                        <select name="status[${employee.id}]" class="form-control status-dropdown" data-employee-id="${employee.id}">
                                            <option value="present" ${status === 'present' ? 'selected' : ''}>Present</option>
                                            <option value="leave" ${status === 'leave' ? 'selected' : ''}>Leave</option>
                                            <option value="onsite"${status === 'onsite' ? 'selected' : ''}>Onsite</option>
                                            <option value="home"${status === 'home' ? 'selected' : ''}>Home</option>
                                            <option value="travel"${status === 'travel' ? 'selected' : ''}>Travel</option>
                                        </select>
                                    </td>
                                </tr>
                            `;
                                    employeeTableBody.append(row);
                                });
                            } else {
                                employeeTableBody.append(
                                    '<tr><td colspan="5" class="text-center">No Employees Found</td></tr>'
                                );
                            }
                        },
                        error: function() {
                            alert('Failed to fetch employees. Please try again.');
                        }
                    });
                }

                // fetchEmployees();

                $('#getEmployee').click(function() {
                    // Show the employee table container
                    $('#employeeTableContainer').show();
                    const department = $('#department').val();
                    const date = $('#date').val();
                    fetchEmployees(department, date);
                });

                // Show Leave Modal on Leave Selection
                $(document).on('change', '.status-dropdown', function() {
                    const status = $(this).val();
                    const employeeId = $(this).data('employee-id');
                    const employeeName = $(this).closest('tr').find('td:eq(1)')
                        .text(); // Assuming the name is in the second column (index 1)


                    if (status === 'onsite') {
                        $('#employeeIdOnsite').val(employeeId);
                        $('#employeeNameOnsite').val(employeeName);
                        $('#onsitModal').modal('show');
                        isOnsiteSubmitted = true;
                    } else if (status === 'leave') {
                        $('#employeeIdLeave').val(employeeId);
                        $('#employeeNameLeave').val(employeeName);
                        $('#leaveModal').modal('show');
                        isLeaveSubmitted = false; // Reset flag when modal is opened
                    }

                });

                // Reset status to 'present' if the modal is closed without submission
                $('#leaveModal').on('hide.bs.modal', function() {
                    const employeeId = $('#employeeIdLeave').val();

                    if (!isLeaveSubmitted) { // Only reset if the form was not submitted
                        console.log(`Resetting status to 'present' for employee ID: ${employeeId}`);
                        updateStatus(employeeId, 'present'); // Reset only if not submitted
                    } else {
                        console.log(`Keeping status as 'leave' for employee ID: ${employeeId}`);
                    }

                });



                // Reset status to 'present' if the modal is closed without submission
                // New flag to track submission state

                $('#onsitModal').on('hide.bs.modal', function() {
                    $('#onsitModal *:focus').blur(); // Remove focus from modal's child elements
                    const employeeIdOnsite = $('#employeeIdOnsite').val();

                    if (isOnsiteSubmitted) {
                        console.log(`Resetting status to 'present' for employee ID: ${employeeIdOnsite}`);
                        updateStatus(employeeIdOnsite, 'present'); // Reset only if not submitted
                    } else {
                        console.log(`Keeping status as 'onsite' for employee ID: ${employeeIdOnsite}`);
                    }


                });
                // Save Leave Details when was subitted whole attendance then save leave details

                $('#saveLeaveDetails').click(function() {
                    const employeeId = $('#employeeIdLeave').val();
                    const leaveDate = $('#leaveDate').val();
                    const leaveType = $('#leaveType').val();
                    const leaveReason = $('#leaveReason').val();

                    if (leaveType && leaveDate && leaveReason) {
                        $.ajax({
                            url: "{{ route('leave.store') }}",
                            method: "POST",
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: {
                                employee_id: employeeId,
                                leave_date: leaveDate,
                                leave_type: leaveType,
                                leave_reason: leaveReason,
                                employee_name: $('#employeeNameLeave').val(), // Include employee name

                            },
                            success: function() {
                                console.log('Leave detail.', employeeId, leaveDate, leaveType,
                                    leaveReason);
                                isLeaveSubmitted =
                                    true; // Set flag to true on successful submission
                                updateStatus(employeeId, 'leave'); // Update status to onsite
                                $('#leaveModal').modal('hide');
                                console.log(isLeaveSubmitted)
                                alert('Leave details saved successfully.');
                            },
                            error: function() {
                                alert('Failed to save leave details.');
                            }
                        });
                    } else {
                        alert('Please fill in all fields.');
                    }
                });
           
            //save onsite details 
            $('#saveOnsiteDetails').click(function() {
                const employeeIdOnsite = $('#employeeIdOnsite').val();
                const onsitedate = $('#onsite_date').val();
                const workOrderNumber = $('#workOrderNumber').val();
                const customerName = $('#customerName').val();
                const contactPersonName = $('#contactPersonName').val();
                const contactNumber = $('#contactNumber').val();
                const fromTime = $('#fromTime').val();
                const toTime = $('#toTime').val();
                const comment = $('#comment').val();

                if (workOrderNumber && customerName && contactPersonName && contactNumber && fromTime && toTime) {
                    isProcessingOnsiteSubmission = true; // Indicate submission is in progress
                    $.ajax({
                        url: "{{ route('onsite.store') }}",
                        method: "POST",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            employee_id: employeeIdOnsite,
                            onsite_date: onsitedate,
                            work_order_number: workOrderNumber,
                            customer_name: customerName,
                            contact_person_name: contactPersonName,
                            contact_number: contactNumber,
                            from_time: fromTime,
                            to_time: toTime,
                            comment: comment,
                            employee_name: $('#employeeNameOnsite').val(), // Include employee name
                        },
                        success: function() {
                            isOnsiteSubmitted = false; // Mark the form as submitted
                            updateStatus(employeeIdOnsite, 'onsite'); // Update status to onsite
                            $('#onsitModal').modal('hide'); // Close the modal
                            console.log(isOnsiteSubmitted)
                            alert('Onsite details saved successfully.');
                        },
                        error: function(xhr) {
                            const response = JSON.parse(xhr.responseText);
                            console.error(response);
                            isProcessingOnsiteSubmission = false; // Clear progress flag
                            alert(`Error: ${response.message}`);
                        },
                    });
                } else {
                    alert('Please fill in all fields.');
                }
            });

        });
        </script>
    @endsection
