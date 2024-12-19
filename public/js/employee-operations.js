
// Function to validate name fields (allow only alphabetic characters)
function validateEmployeeInput(inputId,messageId) {
    const inputElement = document.getElementById(inputId);
    const messageElement = document.getElementById(messageId); // Element to show the message

    if (inputElement) {
        inputElement.addEventListener('input', function (e) {
            let value = e.target.value;
            // Remove non-alphabetic characters
            value = value.replace(/[^a-zA-Z0-9_-]/g, '');

            e.target.value = value;    
            
             // Display validation message if the input is invalid
        if (value.length === 0) {
            messageElement.textContent = "This field is required.";
        } else {
            messageElement.textContent = ""; // Clear the message when valid
        }

        });

       

         // On blur event to show required message if empty
         inputElement.addEventListener('blur', function (e) {
            if (e.target.value.trim() === "") {
                messageElement.textContent = "This field is required.";
            }
        });
    }
}

validateEmployeeInput('employee_id', 'employee_id_message');


// Function to validate name fields (allow only alphabetic characters)
function validateWorkOrderInput(inputId,messageId) {
    const inputElement = document.getElementById(inputId);
    const messageElement = document.getElementById(messageId); // Element to show the message

    if (inputElement) {
        inputElement.addEventListener('input', function (e) {
            let value = e.target.value;
            // Remove non-alphabetic characters
            value = value.replace(/[^0-9]/g, '');

            e.target.value = value;    
            
             // Display validation message if the input is invalid
        if (value.length === 0) {
            messageElement.textContent = "This field is required.";
        } else {
            messageElement.textContent = ""; // Clear the message when valid
        }

        });

       

         // On blur event to show required message if empty
         inputElement.addEventListener('blur', function (e) {
            if (e.target.value.trim() === "") {
                messageElement.textContent = "This field is required.";
            }
        });
    }
}

validateWorkOrderInput('workOrderNumber','workOrderNumberError');

// Function to validate name fields (allow only alphabetic characters)
function validateNameInput(inputId,messageId) {
    const inputElement = document.getElementById(inputId);
    const messageElement = document.getElementById(messageId); // Element to show the message

    if (inputElement) {
        inputElement.addEventListener('input', function (e) {
            let value = e.target.value;
            // Remove non-alphabetic characters
            value = value.replace(/[^a-zA-Z .]/g, '');
            e.target.value = value;    
            
             // Display validation message if the input is invalid
        if (value.length === 0) {
            messageElement.textContent = "This field is required.";
        } else {
            messageElement.textContent = ""; // Clear the message when valid
        }

        });

       

         // On blur event to show required message if empty
         inputElement.addEventListener('blur', function (e) {
            if (e.target.value.trim() === "") {
                messageElement.textContent = "This field is required.";
            }
        });
    }
}
// Apply the validation to both first name and last name fields
validateNameInput('first_name', 'first_name_message');
validateNameInput('last_name', 'last_name_message');
validateNameInput('city', 'city_message');
validateNameInput('emergency_contact_name', 'emergency_contact_name_message');
validateNameInput('account_holder_name', 'account_holder_name_message');
validateNameInput('bank_name', 'bank_name_message');
validateNameInput('branch', 'branch_message');
validateNameInput('insurance_company_name', 'insurance_company_name_message');
validateNameInput('designation','designation_message');
validateNameInput('customerName','customerNameError');
validateNameInput('contactPersonName','contactPersonNameError')

//date of birth validation for age limit 18 to 60
document.getElementById('date_of_birth').addEventListener('input', function (e) {
    let value = e.target.value;
    let dob = new Date(value);
    let today = new Date();
    let age = today.getFullYear() - dob.getFullYear();
    let month = today.getMonth() - dob.getMonth();
    if (month < 0 || (month === 0 && today.getDate() < dob.getDate())) {
        age--;
    }
    if (age < 18 ) {
        alert('Age must be Greater than  18 ');
        e.target.value = '';
    }
});

//mobile number validation
function validateMobileNumberInput(inputId, messageId) {
    const inputElement = document.getElementById(inputId);
    const messageElement = document.getElementById(messageId); // Element to show the message

    if (inputElement) {
        inputElement.addEventListener('input', function (e) {
            let value = e.target.value;
            // Remove non-numeric characters
            value = value.replace(/\D/g, '');
            // Limit to 10 digits
            if (value.length > 10) {
                value = value.slice(0, 10);
            }
            e.target.value = value;

            
            // Display validation message if the input is invalid
            if (value.length === 0) {
                messageElement.textContent = "This field is required.";
            } else if (value.length < 10) {
                messageElement.textContent = "Mobile number must be exactly 10 digits.";
            } else {
                messageElement.textContent = ""; // Clear the message when valid
            }



        });

         // On blur event to show required message if empty
         inputElement.addEventListener('blur', function (e) {
            if (e.target.value.trim() === "") {
                messageElement.textContent = "This field is required.";
            }
        });
    }
}


// Apply the validation for Mobile No 1
validateMobileNumberInput('contactNumber','contactNumberError');
validateMobileNumberInput('mobile_1', 'mobile_1_message');



validateMobileNumberInput('emergency_contact_number','emergency_contact_number_message');

validateInsuranceNumberInput('insurance_no','insurance_no_message');


//insurance 

function validateInsuranceNumberInput(inputId, messageId) {
    const inputElement = document.getElementById(inputId);
    const messageElement = document.getElementById(messageId); // Element to show the message

    if (inputElement) {
        inputElement.addEventListener('input', function (e) {
            let value = e.target.value;
            // Remove non-numeric characters
            value = value.replace(/\D/g, '');
            // Limit to 10 digits
            if (value.length > 10) {
                value = value.slice(0, 10);
            }
            e.target.value = value;

            
            // Display validation message if the input is invalid
            if (value.length === 0) {
                messageElement.textContent = "This field is required.";
            }else {
                messageElement.textContent = ""; // Clear the message when valid
            }



        });

         // On blur event to show required message if empty
         inputElement.addEventListener('blur', function (e) {
            if (e.target.value.trim() === "") {
                messageElement.textContent = "This field is required.";
            }
        });
    }
}


//mobile number validation
function validateACNumberInput(inputId,messageId) {
    const inputElement = document.getElementById(inputId);
    const messageElement = document.getElementById(messageId); // Element to show the message

    if (inputElement) {
        inputElement.addEventListener('input', function (e) {
            let value = e.target.value;
            // Remove non-numeric characters
            value = value.replace(/\D/g, '');
            // Limit to 10 digits
            if (value.length > 10) {
                value = value.slice(0, 20);
            }
            e.target.value = value;

             // Display validation message if the input is invalid
             if (value.length === 0) {
                messageElement.textContent = "This field is required.";
            }else {
                messageElement.textContent = ""; // Clear the message when valid
            }

        });

        // On blur event to show required message if empty
        inputElement.addEventListener('blur', function (e) {
            if (e.target.value.trim() === "") {
                messageElement.textContent = "This field is required.";
            }
        });
    }
}

validateACNumberInput('account_number','account_number_message');


document.getElementById('pin_code').addEventListener('input', function (e) {
    let value = e.target.value;
    const messageElement = document.getElementById('pin_code_message'); // Error message element

    // Remove non-numeric characters
    value = value.replace(/\D/g, '');

    // Limit to 6 digits
    if (value.length > 6) {
        value = value.slice(0, 6);
    }

    e.target.value = value;

    // Display validation message dynamically
    if (value.length === 0) {
        messageElement.textContent = "This field is required.";
    } else if (value.length < 6) {
        messageElement.textContent = "Pin code must be exactly 6 digits.";
    } else {
        messageElement.textContent = ""; // Clear message when valid
    }
});

// Show required message on blur if input is empty
document.getElementById('pin_code').addEventListener('blur', function (e) {
    const messageElement = document.getElementById('pin_code_message');
    if (e.target.value.trim() === "") {
        messageElement.textContent = "This field is required.";
    }
});


// Function to validate email format
function validateEmailInput(inputId, messageId) {
    const inputElement = document.getElementById(inputId);
    const messageElement = document.getElementById(messageId);

    if (inputElement) {
        inputElement.addEventListener('input', function (e) {
            const value = e.target.value;

            // Regular expression to validate email format
            const emailRegex = /^[a-z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

            // Check if input matches email format
            if (value === "") {
                messageElement.textContent = "This field is required.";
            } else if (!emailRegex.test(value)) {
                messageElement.textContent = "Please enter a valid email address.";
            } else {
                messageElement.textContent = ""; // Clear message if valid
            }
        });

        // On blur, check if field is empty
        inputElement.addEventListener('blur', function (e) {
            if (e.target.value.trim() === "") {
                messageElement.textContent = "This field is required.";
            }
        });
    }
}

// Apply the validation to email fields
validateEmailInput('email_personal', 'personal_email_message');
validateEmailInput('email_official', 'official_email_message');


// Address validation
function validateAddressInput(inputId,messageId) {
    const inputElement = document.getElementById(inputId);
    const messageElement = document.getElementById(messageId);

    if (inputElement) {
        inputElement.addEventListener('input', function (e) {
            let value = e.target.value;
            // Remove non-alphanumeric characters
            value = value.replace(/[^a-zA-Z0-9,.\-\/()\s]/g, '');
            e.target.value = value;

             
              if (value === "") {
                messageElement.textContent = "This field is required.";
            }  else {
                messageElement.textContent = ""; // Clear message if valid
            }
        });

        // On blur, check if field is empty
        inputElement.addEventListener('blur', function (e) {
            if (e.target.value.trim() === "") {
                messageElement.textContent = "This field is required.";
            }
        });


    }
}

// Apply the validation to address field
validateAddressInput('address_residential','address_residential_message');
validateAddressInput('address_permanent','address_permanent_message');
validateAddressInput('emergency_contact_address','emergency_contact_address_message');
validateAddressInput('insurance_coverage','insurance_coverage_message');

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

//axaj request to get the state list based on country selection
document.getElementById('country').addEventListener('change', function (e) {
    const countryId = e.target.value;
    const stateSelect = document.getElementById('state');
    stateSelect.innerHTML = '<option value="">Select State</option>';

    if (countryId) {
        fetch(`/get-states/${countryId}`)
            .then(response => response.json())
            .then(data => {
                data.forEach(state => {
                    const option = document.createElement('option');


                    option.value = state.name;
                    option.textContent = state.name;
                    stateSelect.appendChild(option);
                });
            });
    }
});

// //photo upload preview
// document.getElementById('photo').addEventListener('change', function(event) {
//     const [file] = event.target.files;
//     if (file) {
//         const preview = document.getElementById('photoPreview');
//         preview.src = URL.createObjectURL(file);
//         preview.style.display = 'block'; // Show the preview
//     }
// });


document.addEventListener("DOMContentLoaded", function () {
    const photoInput = document.getElementById("photoInput");
    const photoPreview = document.getElementById("photoPreview");
    const removePhotoButton = document.getElementById("removePhoto");
    

    // Display preview when a new photo is selected
    photoInput.addEventListener("change", function (e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                photoPreview.src = e.target.result;
                photoPreview.style.display = "block";
                removePhotoButton.style.display = "block";
            };
            reader.readAsDataURL(file);
        }
    });

    // Remove the previewed photo
    removePhotoButton.addEventListener("click", function () {
        photoInput.value = ""; // Clear the input
        photoPreview.src = "#"; // Reset the src
        photoPreview.style.display = "none"; // Hide the preview
        removePhotoButton.style.display = "none"; // Hide the remove button
    });
});
// Function to validate IFSC code
function validateIfscCodeInput(inputId, messageId) {
    const inputElement = document.getElementById(inputId);
    const messageElement = document.getElementById(messageId); // Element to show the message

    if (inputElement) {
        inputElement.addEventListener('input', function (e) {
            let value = e.target.value;
            // Remove invalid characters (anything other than uppercase letters and numbers)
            value = value.replace(/[^A-Z0-9]/g, '');
            // Limit to 11 characters
            if (value.length > 11) {
                value = value.slice(0, 11);
            }
            e.target.value = value;

            // Display validation message if the input is invalid
            if (value.length === 0) {
                messageElement.textContent = "This field is required.";
            } else if (value.length !== 11) {
                messageElement.textContent = "IFSC code must be exactly 11 characters.";
            } else {
                messageElement.textContent = ""; // Clear the message when valid
            }
        });

        inputElement.addEventListener('blur', function (e) {
            const value = e.target.value;
            if (value.trim() === "") {
                messageElement.textContent = "This field is required.";
            }
        });
    }
}
// Apply the validation to IFSC code field
validateIfscCodeInput('ifsc_code', 'ifsc_code_message');

// Get the date input fields and error message element
const dateOfJoining = document.getElementById('date_of_joining');
const dateOfExit = document.getElementById('date_of_exit');
const dateError = document.getElementById('date_of_exit_error');

// Add event listener for changes in the "Date of Exit" field
dateOfExit.addEventListener('input', function () {
    const joiningDateValue = new Date(dateOfJoining.value);
    const exitDateValue = new Date(dateOfExit.value);

    // Check if the "Date of Exit" is greater than "Date of Joining"
    if (dateOfJoining.value && exitDateValue <= joiningDateValue) {
        dateError.textContent = "Date of Exit must be greater than Date of Joining.";
        dateOfExit.value = ""; // Clear the invalid date
    } else {
        dateError.textContent = ""; // Clear the error message
    }
});