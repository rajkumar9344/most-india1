$(document).ready(function () {
    // Call the API to get departments
    $.ajax({
        url: departmentsUrl, // Your API endpoint for fetching departments
        type: "GET",
        success: function (response) {
            let departmentDropdown = $('#department');
            departmentDropdown.empty(); // Clear existing options
            departmentDropdown.append('<option value="All" selected>All</option>'); // Default option

            // Populate the dropdown with department names
            response.forEach(function (department) {
                departmentDropdown.append(`<option value="${department.name}"> ${department.name}</option>`);
            });
        },
        error: function (xhr, status, error) {
            console.error("Error fetching departments:", xhr, status, error);
        }
    });
});


