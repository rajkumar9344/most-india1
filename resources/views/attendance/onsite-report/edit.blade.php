@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <div class="container p-4">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Update Onsite Details</h2>
            <a href="{{ route('onsite.index') }}" class="btn btn-black"><i class="fas fa-arrow-left"></i> Back</a>
        </div>
      
            <!-- Card for Onsite Form -->
            <div class="card">
                <div class="card-body">
                    <!-- Form for updating onsite details -->
                    <form id="onsiteForm" action="{{ route('onsite.update', ['id' => $onsite->id]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="employee_id" value="{{ $onsite->employee_id }}">

                        <div class="form-group">
                            <label for="employeeName">Employee Name <span class="required-asterisk">*</span></label>
                            <input type="text" id="employeeNameOnsite" name="employee_name" class="form-control" 
                                value="{{ $onsite->employee_name }}" disabled>
                        </div>

                        <div class="form-group">
                            <label for="workOrderNumber">Work Order No <span class="required-asterisk">*</span></label>
                            <input type="text" id="workOrderNumber" name="work_order_number" class="form-control" 
                                value="{{ $onsite->work_order_number }}" required>
                            <span id="workOrderNumberError" class="error-message text-danger"></span>
                        </div>

                        <div class="form-group">
                            <label for="customerName">Customer Name <span class="required-asterisk">*</span></label>
                            <input type="text" id="customerName" name="customer_name" class="form-control" 
                                value="{{ $onsite->customer_name }}" required>
                            <span id="customerNameError" class="error-message text-danger"></span>
                        </div>

                        <div class="form-group">
                            <label for="contactPersonName">Contact Person Name <span class="required-asterisk">*</span></label>
                            <input type="text" id="contactPersonName" name="contact_person_name" class="form-control" 
                                value="{{ $onsite->contact_person_name }}" required>
                            <span id="contactPersonNameError" class="error-message text-danger"></span>
                        </div>

                        <div class="form-group">
                            <label for="contactNumber">Contact No <span class="required-asterisk">*</span></label>
                            <input type="text" id="contactNumber" name="contact_number" class="form-control" 
                                value="{{ $onsite->contact_number }}" required>
                            <span id="contactNumberError" class="error-message text-danger"></span>
                        </div>

                        <div class="form-group">
                            <label for="onsite_date">Date <span class="required-asterisk">*</span></label>
                            <input type="date" id="onsite_date" name="onsite_date" class="form-control" 
                                value="{{ $onsite->onsite_date }}" required>
                        </div>

                        <div class="form-group">
                            <label for="fromTime">From Time <span class="required-asterisk">*</span></label>
                            <input type="time" id="fromTime" name="from_time" class="form-control" 
                                value="{{ $onsite->from_time }}" required>
                        </div>

                        <div class="form-group">
                            <label for="toTime">To Time <span class="required-asterisk">*</span></label>
                            <input type="time" id="toTime" name="to_time" class="form-control" 
                                value="{{ $onsite->to_time }}" required>
                        </div>

                        <div class="form-group">
                            <label for="comment">Comment</label>
                            <textarea id="comment" name="comment" class="form-control" rows="3">{{ $onsite->comments }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
     
    </div>

    <script src="{{ asset('js/employee-operations.js') }}"></script>
    <script>
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
    </script>
@endsection
