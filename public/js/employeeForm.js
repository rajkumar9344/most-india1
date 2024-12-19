


// State to track validation
const validationState = {
    first_name: false,
    last_name: false,
    city: false,
    emergency_contact_name: false,
    account_holder_name: false,
    bank_name: false,
    branch: false,
    insurance_company_name: false,
    designation: false,
    mobile_1: false,
    // insurance_no: false,
    emergency_contact_number: false,
    email_personal: false,
    pin_code: false,

    
};

// Function to enable or disable the submit button
function updateSubmitButtonState() {
    const allValid = Object.values(validationState).every(Boolean);
    document.getElementById('submitButton').disabled = !allValid;
}

// Function to validate name fields
function validateNameInput(inputId) {
    const inputElement = document.getElementById(inputId);

    if (inputElement) {
        inputElement.addEventListener('input', function (e) {
            let value = e.target.value;
            value = value.replace(/[^a-zA-Z .]/g, '');
            e.target.value = value;

            validationState[inputId] = !!value.trim();
            updateSubmitButtonState();
        });
    }
}

// Function to validate mobile number
function validateMobileNumberInput(inputId, messageId) {
    const inputElement = document.getElementById(inputId);
    const messageElement = document.getElementById(messageId);

    if (inputElement) {
        inputElement.addEventListener('input', function (e) {
            let value = e.target.value;
            value = value.replace(/\D/g, '');
            if (value.length > 10) value = value.slice(0, 10);
            e.target.value = value;

            if (value.length === 10) {
                validationState[inputId] = true;
                messageElement.textContent = "";
            } else {
                validationState[inputId] = false;
                messageElement.textContent = "Mobile number must be exactly 10 digits.";
            }
            updateSubmitButtonState();
        });
    }
}

// Function to validate email
function validateEmailInput(inputId) {
    const inputElement = document.getElementById(inputId);

    if (inputElement) {
        inputElement.addEventListener('input', function (e) {
            let value = e.target.value;
            const isValid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value);
            validationState[inputId] = isValid;
            updateSubmitButtonState();
        });
    }
}

// Function to validate pin code
function validatePinCodeInput(inputId) {
    const inputElement = document.getElementById(inputId);

    if (inputElement) {
        inputElement.addEventListener('input', function (e) {
            let value = e.target.value;
            value = value.replace(/\D/g, '');
            if (value.length > 6) value = value.slice(0, 6);
            e.target.value = value;

            validationState[inputId] = value.length === 6;
            updateSubmitButtonState();
        });
    }
}

// Apply validation functions
validateNameInput('first_name');
validateNameInput('last_name');
validateNameInput('city');
validateNameInput('emergency_contact_name');
validateNameInput('account_holder_name');
validateNameInput('bank_name');
validateNameInput('branch');
validateNameInput('insurance_company_name');
validateNameInput('designation');




validateMobileNumberInput('mobile_1', 'mobile_1_message');
validateMobileNumberInput('emergency_contact_number','emergency_contact_number_message');
// validateInsuranceNumberInput('insurance_no','insurance_no_message');
validateEmailInput('email_personal');
validateEmailInput('email_official');
validatePinCodeInput('pin_code');

// Add similar validation for other fields...
function validateEmployeeInput(inputId) {
    const inputElement = document.getElementById(inputId);

    if (inputElement) {
        inputElement.addEventListener('input', function (e) {
            let value = e.target.value;
            // Remove non-alphanumeric, underscore, and hyphen characters
            value = value.replace(/[^a-zA-Z0-9_-]/g, '');
            e.target.value = value;

            // Update validation state
            validationState[inputId] = !!value.trim();
            updateSubmitButtonState();
        });
    }
}
validateEmployeeInput('employee_id');

// Function to validate address input (alphanumeric, commas, periods, slashes, hyphens, parentheses, and spaces allowed)
function validateAddressInput(inputId) {
    const inputElement = document.getElementById(inputId);

    if (inputElement) {
        inputElement.addEventListener('input', function (e) {
            let value = e.target.value;
            // Remove non-alphanumeric characters except allowed ones (comma, period, hyphen, slash, parentheses, and space)
            value = value.replace(/[^a-zA-Z0-9,.\-\/()\s]/g, '');
            e.target.value = value;

            // Update validation state
            validationState[inputId] = !!value.trim();
            updateSubmitButtonState();
        });
    }
}

// Apply the validation to the address fields
validateAddressInput('address_residential');
validateAddressInput('address_permanent');
validateAddressInput('emergency_contact_address');
validateAddressInput('insurance_coverage');


// same as residential address checkbox is checked then copy and auto fill the residential address to permanent address , if unchecked then clear the permanent address & emergency contact address , if checked then copy the residential address to emergency contact address
document.getElementById('same_as_residential1').addEventListener('change', function (e) {
    const residentialAddress = document.getElementById('address_residential');
    const permanentAddress = document.getElementById('address_permanent');
    // const emergencyContactAddress = document.getElementById('emergency_contact_address');

    if (e.target.checked) {
        permanentAddress.value = residentialAddress.value;
        // emergencyContactAddress.value = residentialAddress.value;
    } else {
        permanentAddress.value = '';
        // emergencyContactAddress.value = '';
    }
});

document.getElementById('same_as_residential2').addEventListener('change', function (e) {
    const residentialAddress = document.getElementById('address_residential');
    // const permanentAddress = document.getElementById('address_permanent');
    const emergencyContactAddress = document.getElementById('emergency_contact_address');

    if (e.target.checked) {
        // permanentAddress.value = residentialAddress.value;
        emergencyContactAddress.value = residentialAddress.value;
    } else {
        // permanentAddress.value = '';
        emergencyContactAddress.value = '';
    }
});



$(document).ready(function() {
    // Event listener for form submission
    $('#employeeForm').on('submit', function(e) {
        e.preventDefault(); // Prevent default form submission

        // Collect form data
        const formData = new FormData();

        // Personal Details
        formData.append('first_name', $('input[name="first_name"]').val());
        formData.append('last_name', $('input[name="last_name"]').val());
        formData.append('date_of_birth', $('input[name="date_of_birth"]').val());
        formData.append('gender', $('select[name="gender"]').val());
        formData.append('city', $('input[name="city"]').val());
        formData.append('state', $('select[name="state"]').val());
        formData.append('country', $('select[name="country"]').val());
        formData.append('pin_code', $('input[name="pin_code"]').val());
        formData.append('address_residential', $('textarea[name="address_residential"]').val());
        formData.append('address_permanent', $('textarea[name="address_permanent"]').val());
        formData.append('same_as_residential', $('#same_as_residential').is(':checked'));
        formData.append('emergency_contact_name', $('input[name="emergency_contact_name"]').val());
        formData.append('emergency_contact_number', $('input[name="emergency_contact_number"]').val());
        formData.append('emergency_contact_address', $('textarea[name="emergency_contact_address"]').val());
        formData.append('blood_group', $('select[name="blood_group"]').val());
        formData.append('mobile_1', $('input[name="mobile_1"]').val());
        formData.append('mobile_2', $('input[name="mobile_2"]').val());
        formData.append('email_personal', $('input[name="email_personal"]').val());
        formData.append('photo', $('input[name="photo"]')[0].files[0]);

        // Company Details
        formData.append('employee_id', $('input[name="employee_id"]').val());
        formData.append('department', $('select[name="department"]').val());
        formData.append('designation', $('input[name="designation"]').val());
        formData.append('date_of_joining', $('input[name="date_of_joining"]').val());
        formData.append('date_of_exit', $('input[name="date_of_exit"]').val());
        formData.append('status', $('select[name="status"]').val());
        formData.append('email_official', $('input[name="email_official"]').val());

        // Bank Details
        formData.append('account_holder_name', $('input[name="account_holder_name"]').val());
        formData.append('account_number', $('input[name="account_number"]').val());
        formData.append('bank_name', $('input[name="bank_name"]').val());
        formData.append('branch', $('input[name="branch"]').val());
        formData.append('ifsc_code', $('input[name="ifsc_code"]').val());

        // Insurance Details
        formData.append('insurance_no', $('input[name="insurance_no"]').val());
        formData.append('insurance_from_date', $('input[name="insurance_from_date"]').val());
        formData.append('insurance_to_date', $('input[name="insurance_to_date"]').val());
        formData.append('insurance_company_name', $('input[name="insurance_company_name"]').val());
        formData.append('insurance_coverage', $('textarea[name="insurance_coverage"]').val());


        // Make AJAX API call
        $.ajax({
            url: employeesStoreUrl, // Replace with your API endpoint
            method: 'POST',
            data: formData,
            processData: false, // Required for FormData
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                    'content') // Add CSRF token if needed
            },
            success: function(response) {
                // Handle success response
                console.log('Success:', response);
                if (confirm('Employee data saved successfully! Do you want to continue?')) {
                    // Redirect if the user clicks OK
                    window.location.href = successRedirectUrl; // Replace with your success route
                } else {
                    // Optionally handle if the user clicks Cancel
                    console.log('User canceled the redirection.');
                }
            }
            ,
            error: function(xhr, status, error) {
                if (xhr.status === 422) {
                    const errors = xhr.responseJSON.errors;
                    for (const field in errors) {
                        alert(`${field}: ${errors[field].join(', ')}`);
                    }
                } else {
                    alert('An unexpected error occurred.');
                }
            }
        });
    });
});



$(document).ready(function () {
    // Function to populate dropdowns
    function populateDropdown(apiUrl, dropdownSelector, defaultOptionText, valueKey = 'name', textKey = 'name') {
        $.ajax({
            url: apiUrl, // API endpoint to fetch data
            type: "GET",
            success: function (response) {
                let dropdown = $(dropdownSelector);
                dropdown.empty(); // Clear existing options
                dropdown.append(`<option value="">${defaultOptionText}</option>`); // Default option

                // Populate the dropdown with data
                response.forEach(function (item) {
                    dropdown.append(`<option value="${item[valueKey]}">${item[textKey]}</option>`);
                });
            },
            error: function (xhr, status, error) {
                console.error(`Error fetching data from ${apiUrl}:`, xhr, status, error);
            }
        });
    }

    // Populate dropdowns
    populateDropdown(statesurl, '#state', 'Select a State');
    populateDropdown(BloodGroupUrl, '#blood_group', 'Select a Blood Group');
    populateDropdown(departmentsUrl, '#department', 'Select a Department');
});



document.addEventListener('DOMContentLoaded', function () {
    const photoInput = document.getElementById('photoInput');
    const photoPreview = document.getElementById('photoPreview');
    const removePhoto = document.getElementById('removePhoto');

    // Show preview when a photo is selected
    photoInput.addEventListener('change', function () {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();

            reader.onload = function (e) {
                photoPreview.src = e.target.result;
                photoPreview.style.display = 'block';
                removePhoto.style.display = 'block';
            };

            reader.readAsDataURL(file);
        }
    });

    // Remove photo and reset the input
    removePhoto.addEventListener('click', function () {
        photoPreview.src = '#';
        photoPreview.style.display = 'none';
        removePhoto.style.display = 'none';
        photoInput.value = ''; // Clear the file input
    });
});


document.addEventListener('DOMContentLoaded', function() {
    console.log("clear , initializing DataTable...");
    document.getElementById('clearBtn').addEventListener('click', function() {
        document.getElementById('employeeForm').reset(); // Reset the form using its ID
    });
});


// Function to validate Employee ID
function validateEmployeeId(inputId, messageId) {
    const inputElement = document.getElementById(inputId);
    const messageElement = document.getElementById(messageId); // Element to show the message

    if (inputElement) {
        inputElement.addEventListener('input', function () {
            const employeeId = inputElement.value.trim();
            if (employeeId) {
                // Make an AJAX request to check if the employee ID already exists
                checkEmployeeIdExistence(employeeId, messageElement);
            } else {
                messageElement.textContent = ""; // Clear message if input is empty
            }
        });
    }
}

// // Function to check if Employee ID exists
// function checkEmployeeIdExistence(employeeId, messageElement) {
//     console.log('checking employee');
//     // Send AJAX request to check if the employee ID exists
//     $.ajax({
      
//         url: checkid,  // Route to handle this request
//         type: 'POST',
//         data: {
//             employee_id: employeeId,
          
//         },
//         processData: false, // Do not process data (important for file uploads)
//         contentType: false, // Do not set content type (important for file uploads)
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         },
//         success: function(response) {
//             if (response.exists) {
//                 console.log(response);
//                 messageElement.textContent = "The Employee ID already exists.";
//             } else {
//                 messageElement.textContent = ""; // Clear message if ID is unique
//             }
//         }
//     });
// }

// // Apply the validation to Employee ID field
// validateEmployeeId('employee_id', 'employee_id_message');
