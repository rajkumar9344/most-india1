


$(document).ready(function() {
    $('#employeeForm').on('submit', function(e) {
        e.preventDefault(); // Prevent default form submission

       
      


       // Create a FormData object
       const formData = new FormData(this); // 'this' refers to the form itself
     

       for (let pair of formData.entries()) {
        console.log(pair[0]+ ': ' + pair[1]);
    }

       // Log the form data to see the contents
    //    console.log("Form Data:", formData);
        // Check if data is appended correctly
     
        // Use the dynamically generated URL
        $.ajax({
            url: '/employees/' + employeeId,  // Using the dynamic employee ID in the URL
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
             console.log('Success:', response);
                if (confirm('Employee updated successfully! Do you want to continue?')) {
                    // Redirect if the user clicks OK
                    window.location.href = successRedirectUrl; // Replace with your success route
                } else {
                    // Optionally handle if the user clicks Cancel
                    console.log('User canceled the redirection.');
                }
            },
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


// $(document).ready(function () {
//     // Call the API to get blood groups
//     $.ajax({
//         url: '{{ url("api/blood-groups") }}', // Your API endpoint for fetching blood groups
//         type: "GET",
//         success: function (response) {
//             let bloodGroupDropdown = $('#blood_group');
//             bloodGroupDropdown.empty(); // Clear existing options
//             bloodGroupDropdown.append('<option value="" disabled>Select a Blood Group</option>'); // Default option

//             // Populate the dropdown with blood groups
//             response.forEach(function (bloodGroup) {
//                 let isSelected = (bloodGroup.name === selectedBloodGroup) ? 'selected' : '';
//                 bloodGroupDropdown.append(`<option value="${bloodGroup.name}" ${isSelected}>${bloodGroup.name}</option>`);
//             });
//         },
//         error: function (xhr, status, error) {
//             console.error("Error fetching blood groups:", xhr, status, error);
//         }
//     });
// });
