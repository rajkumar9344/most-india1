@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <div class="p-4">
        <div class="d-flex justify-content-between align-items-center">
            <h2>New Employee</h2>
            <a href="{{ route('employees.index') }}" class="btn btn-black"><i class="fas fa-arrow-left"></i> Back
            </a>
        </div>

        <div class="container back-color">
            <!-- <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/ form-data"> -->
            <form id="employeeForm" enctype="multipart/ form-data">

                @csrf
                <div class="card">
                    <h4 class="mt-4">Personal Details</h4>

                    <!-- Personal Details -->
                    <div class="container mt-3">
                        <div class="row">
                            <div class=" form-group col-md-4">
                                <label >First Name  <span class="required-asterisk">*</span></label>
                                <input type="text" name="first_name" id="first_name"
                                    class="  employee-input form-control" required>
                                    <span id="first_name_message" style="color: red; font-size: 12px;"></span> <!-- Validation message -->
                            </div>
                            <div class=" form-group col-md-4">
                                <label>Last Name  <span class="required-asterisk">*</span></label>
                                <input type="text" name="last_name" id="last_name" class=" employee-input form-control"
                                    required>
                                    <span id="last_name_message" style="color: red; font-size: 12px;"></span> 
                                    
                            </div>
                            <div class=" form-group col-md-4">
                                <label for="dob">Date of Birth  <span class="required-asterisk">*</span></label>
                                <input type="date" class=" employee-input form-control" id="date_of_birth"
                                    name="date_of_birth" value="{{ old('dob') }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="container mt-3">
                        <div class="row">
                            <div class=" form-group col-md-4">
                                <label for="gender">Gender  <span class="required-asterisk">*</span></label>
                                <select class="employee-select  employee-input form-control" id="gender" name="gender"
                                    required>
                                    <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                                    <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
                                </select>
                            </div>
                            <div class=" form-group col-md-4">
                                <label for="city">City  <span class="required-asterisk">*</span></label>
                                <input type="text" class=" employee-input form-control" id="city" name="city"
                                    value="{{ old('city') }}" required>
                                    <span id="city_message" style="color: red; font-size: 12px;"></span> <!-- Validation message -->
                                    
                                    
                            </div>
                            <div class="form-group col-md-4">
                                <label for="state">State  <span class="required-asterisk">*</span></label>
                                <select class="employee-input form-control" id="state" name="state" required>
                                    <option value="">Select a State</option>
                                    <span id="state_message" style="color: red; font-size: 12px;"></span> <!-- Validation message -->
                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="container mt-3">
                        <div class="row">
                            <div class=" form-group col-md-4">
                                <label for="country">Country  <span class="required-asterisk">*</span></label>
                                <select class=" employee-input form-control" id="country" name="country" required>
                                    <option value="India" {{ old('country') == 'India' ? 'selected' : '' }}>India</option>
                                    <!-- Add other countries as necessary -->
                                </select>
                            </div>
                            <div class=" form-group col-md-4">
                                <label for="pin_code">Pin Code  <span class="required-asterisk">*</span></label>
                                <input type="text" class=" employee-input form-control" id="pin_code" name="pin_code"
                                    value="{{ old('pin_code') }}" required>
                                    <span id="pin_code_message" style="color: red; font-size: 12px;"></span> <!-- Validation message -->

                            </div>
                            <div class=" form-group col-md-4">
                                <label for="email_personal">Email ID personal  <span class="required-asterisk">*</span></label>
                                <input type="email" class=" employee-input form-control" id="email_personal"
                                    name="email_personal" value="{{ old('email_personal') }}" required>
                                    <span id="personal_email_message" style="color: red; font-size: 12px;"></span> <!-- Validation message -->
                            </div>

                        </div>
                    </div>
                    <div class="container mt-3">
                        <!-- Optional container with margin -->
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="blood_group">Blood Group  <span class="required-asterisk">*</span></label>
                                <select class="employee-input form-control" id="blood_group" name="blood_group" required>
                                    <option value="" disabled selected>Select a Blood Group</option>
                                </select>
                            </div>

                            <div class=" form-group col-md-4">
                                <label for="mobile_1">Mobile No 1  <span class="required-asterisk">*</span></label>
                                <input type="text" class=" employee-input form-control" id="mobile_1" name="mobile_1"
                                    value="{{ old('mobile_1') }}" required>
                                    <span id="mobile_1_message" style="color: red; font-size: 12px;"></span> <!-- Validation message -->
                            </div>
                            <div class=" form-group col-md-4">
                                <label for="mobile_2">Mobile No 2</label>
                                <input type="text" class=" employee-input form-control" id="mobile_2" name="mobile_2"
                                    value="{{ old('mobile_2') }}">
                                  

                            </div>

                        </div>
                    </div>

                    <div class="container mt-3">
                        <!-- Optional container with margin -->
                        <div class="row">
                            <div class=" form-group col-md-6">
                                <label for="address_residential">Residential Address  <span class="required-asterisk">*</span></label>
                                <textarea class=" employee-input form-control" id="address_residential" name="address_residential" required>{{ old('address_residential') }}</textarea>
                                <span id="address_residential_message" style="color: red; font-size: 12px;"></span> 
                            </div>

                            <div class=" form-group col-md-6">
                                <label for="address_permanent">Permanent Address</label>
                                <input type="checkbox" id="same_as_residential1" name="same_as_residential1"
                                    value="1"> Same
                                as
                                Residential Address  <span class="required-asterisk">*</span></input>
                                <textarea class=" employee-input form-control" id="address_permanent" name="address_permanent" required>{{ old('address_permanent') }}</textarea>
                                <span id="address_permanent_message" style="color: red; font-size: 12px;"></span> 
                            </div>
                        </div>
                    </div>


                    <div class="container mt-3">
                        <div class="row">
                            <div class="col-md-6">
                                <div class=" form-group ">
                                    <label for="emergency_contact_name">Emergency Contact Name  <span class="required-asterisk">*</span></label>
                                    <input type="text" class=" employee-input form-control"
                                        id="emergency_contact_name" name="emergency_contact_name"
                                        value="{{ old('emergency_contact_name') }}" required>
                                        <span id="emergency_contact_name_message" style="color: red; font-size: 12px;"></span> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class=" form-group ">
                                    <label for="emergency_contact_number">Emergency Contact Number  <span class="required-asterisk">*</span></label>
                                    <input type="text" class=" employee-input form-control"
                                        id="emergency_contact_number" name="emergency_contact_number"
                                        value="{{ old('emergency_contact_number') }}" required>
                                        <span id="emergency_contact_number_message" style="color: red; font-size: 12px;"></span> <!-- Validation message -->
                                </div>
                            </div>
                            <div class="col-md-12 ">
                                <div class=" form-group ">
                                    <label for="emergency_contact_address">Emergency Contact Address </label>
                                    <input type="checkbox" id="same_as_residential2" name="same_as_residential2"
                                        value="1" required>
                                    Same
                                    as <span class="required-asterisk">*</span></input>
                                    <textarea class=" employee-input form-control" id="emergency_contact_address" name="emergency_contact_address">{{ old('emergency_contact_address') }}</textarea>
                                    <span id="emergency_contact_address_message" style="color: red; font-size: 12px;"></span> 
                                </div>
                            </div>

                        </div>
                    </div>



                    <!-- Company Details -->
                    <h4 class="mt-4">Company Details</h4>
                    <div class="container  mt-3">
                        <div class="row">
                            <div class=" form-group col-md-4">
                                <label>Employee ID: <span class="required-asterisk">*</span></label>
                                <input type="text" name="employee_id" id='employee_id' class=" employee-input form-control" required>
                                <span id="employee_id_message" style="color: red; font-size: 12px;"></span> 
                            </div>
                            <div class="form-group col-md-4">
                                <label for="department">Department <span class="required-asterisk">*</span></label>
                                <select name="department" id="department" class="employee-input form-control" required>
                                    <option value="">Select Department</option>

                                    <!-- Add more departments here -->
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="designation">Designation <span class="required-asterisk">*</span></label>
                                <input type="text" name="designation" id="designation"
                                    class="employee-input form-control" required placeholder="">
                                    <span id="designation_message" style="color: red; font-size: 12px;"></span> 
                            </div>
                        </div>
                    </div>

                    <div class="container mt-3">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="date_of_joining">Date of Joining <span class="required-asterisk">*</span></label>
                                <input type="date" name="date_of_joining" id="date_of_joining"
                                    class="employee-input form-control" required>
                                    
                            </div>
                            <div class="form-group col-md-6">
                                <label for="date_of_exit">Date of Exit</label>
                                <input type="date" name="date_of_exit" id="date_of_exit"
                                    class="employee-input form-control">
                                    <div class="error-message" id="date_of_exit_error" style="color: red; font-size: 14px; margin-top: 5px;"></div>
                            </div>

                        </div>

                    </div>
                    <div class="container  mt-3">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="status">Status <span class="required-asterisk">*</span></label>
                                <select name="status" id="status" class="employee-input form-control" required>
                                    <option value="">Select Status</option>
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>

                                    <!-- Add more status options here -->
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Official Email ID <span class="required-asterisk">*</span></label>
                                <input type="email" name="email_official" id="email_official"
                                    class="employee-input form-control" required placeholder="">
                                    <span id="official_email_message" style="color: red; font-size: 12px;"></span> <!-- Validation message -->
                            </div>
                        </div>
                    </div>

                    <h4 class="mt-4">Bank Account Details</h4>

                    <div class="container mt-3">
                        <div class="row">
                            <div class="form-group col-md-4 ">
                                <label for="account_holder_name">Account Holder Name <span class="required-asterisk">*</span></label>
                                <input type="text" name="account_holder_name" id="account_holder_name"
                                    class="employee-input form-control" required placeholder="">
                                    <span id="account_holder_name_message" style="color: red; font-size: 12px;"></span> 
                            </div>
                            <div class="form-group col-md-4">
                                <label for="account_number">Account Number <span class="required-asterisk">*</span></label>
                                <input type="text" name="account_number" id="account_number"
                                    class="employee-input form-control" required placeholder="">
                                    <span id="account_number_message" style="color: red; font-size: 12px;"></span> 
                            </div>
                            <div class="form-group col-md-4">
                                <label for="bank_name">Bank Name <span class="required-asterisk">*</span></label>
                                <input type="text" name="bank_name" id="bank_name"
                                    class="employee-input form-control" required placeholder="">
                                    <span id="bank_name_message" style="color: red; font-size: 12px;"></span> 
                            </div>

                        </div>

                    </div>

                    <div class="container mt-3">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="branch">Branch <span class="required-asterisk">*</span></label>
                                <input type="text" name="branch" id="branch" class="employee-input form-control"
                                    required placeholder="">
                                    <span id="branch_message" style="color: red; font-size: 12px;"></span> 
                            </div>
                            <div class="form-group col-md-6">
                                <label for="ifsc_code">IFSC Code <span class="required-asterisk">*</span></label>
                                <input type="text" name="ifsc_code" id="ifsc_code" maxlength="11"
                                    class="employee-input form-control" required placeholder="">
                                    <span id="ifsc_code_message" style="color: red; font-size: 12px;"></span>
                             
                            </div>

                        </div>

                    </div>

                    <h4 class="mt-4">Insurance Details </h4>

                    <div class="container mt-3">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="insurance_no">Insurance No <span class="required-asterisk">*</span></label>
                                <input type="text" name="insurance_no" id="insurance_no"
                                    class="employee-input form-control" required placeholder="">
                                    <span id="insurance_no_message" style="color: red; font-size: 12px;"></span> 
                            </div>
                            <div class="form-group col-md-6">
                                <label for="from_date">From Date</label>
                                <input type="date" name="insurance_from_date" id="insurance_from_date"
                                    class="employee-input form-control">
                            </div>

                        </div>
                    </div>
                    <div class="container mt-3">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="to_date">To Date <span class="required-asterisk">*</span></label>
                                <input type="date" name="insurance_to_date" id="insurance_to_date"
                                    class="employee-input form-control" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="insurance_company">Insurance Company Name <span class="required-asterisk">*</span></label>
                                <input type="text" name="insurance_company_name" id="insurance_company_name"
                                    class="employee-input form-control" required placeholder="">
                                    <span id="insurance_company_name_message" style="color: red; font-size: 12px;"></span> 
                            </div>
                        </div>
                    </div>

                    <div class="container mt-3">
                        <div class="row">

                            <div class="form-group col-md-12">
                                <label for="insurance_coverage">Insurance Coverage <span class="required-asterisk">*</span></label>
                                <textarea name="insurance_coverage" id="insurance_coverage" class="employee-input form-control" rows="2"
                                    placeholder="" required></textarea>
                                    <span id="insurance_coverage_message" style="color: red; font-size: 12px;"></span> 
                            </div>
                        </div>
                    </div>

                    <div class="container mt-3">
                        <div class="row">
                            <!-- Photo Upload Input -->
                            <div class="form-group col-md-4">
                                <label for="photo">Photo:</label>
                                <input type="file" name="photo" class="photo form-control" id="photoInput"
                                    accept="image/*">
                            </div>

                            <!-- Preview Container -->
                            <div class="form-group col-md-4 d-flex flex-column align-items-center">
                                <!-- Photo Preview -->
                                <div style="position: relative; display: inline-block;">
                                    <img id="photoPreview" src="#" alt="Preview"
                                        style="max-width: 100%; max-height: 150px; display: none; border: 1px solid #ddd; padding: 5px;">
                                    <!-- X Button -->
                                    <button id="removePhoto" type="button"
                                        style="position: absolute; top: 5px; right: 5px; background: red; color: white; border: none; border-radius: 50%; width: 25px; height: 25px; font-size: 16px; display: none; cursor: pointer;">
                                        &times;
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Add company, bank, insurance fields similarly -->
                    <div>
                        <button type="submit" style="padding:5px 15px 5px 15px; margin-top:20px; margin-left:8px;"
                            class="btn btn-primary" id="submitButton" disabled>Submit</button>

                        <button type="button" id="clearBtn"
                            style="margin-left:10px;margin-top:20px; padding:5px 20px 5px 20px;"
                            class="btn btn-danger">Clear</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
    </div>

    <!-- Include jQuery Library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        const employeesStoreUrl = "{{ route('employees.store') }}";
        const successRedirectUrl = "{{ route('employees.index') }}";
        const statesurl = "{{ route('employees.states') }}";
        const BloodGroupUrl = "{{ route('employees.BloodGroup') }}";
        const departmentsUrl = "{{ route('employees.Departments') }}";
        // Function to check if Employee ID exists
        const checkid = "{{ route('employees.checkEmployeeIdExistence') }}";

    </script>
    <script src="{{ asset('js/employeeForm.js') }}"></script>
    <script src="{{ asset('js/employee-operations.js') }}"></script>
@endsection
