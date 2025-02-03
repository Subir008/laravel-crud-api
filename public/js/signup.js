// Functionality of signup button
$("#signupbtn").on("click", function (e) {
    // Prevent default behavior of button click event
    e.preventDefault();

    // Retrieve user data from input fields
    let email = $("#email").val(); // Get email from #email input field
    let name = $("#name").val(); // Get name from #name input field
    let password = $("#password").val(); // Get password from #password input field

    // Send AJAX request to /api/signup endpoint
    $.ajax({
        // URL of endpoint to send request to
        url: "/api/signup",
        // Type of request to send (POST)
        type: "POST",
        // Content type of request body (JSON)
        contentType: "application/json",
        // Data to send in request body (JSON object containing user data)
        data: JSON.stringify({
            name: name, // User's name
            email: email, // User's email
            password: password, // User's password
        }),
        // Callback function to execute when request is successful
        success: function (response) {
            console.log(response);
            
            // Attaching the alert if present
            let alert = `
            <div class="alert alert-success alert-dismissible fade show" role="alert" >
            ${response.message}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            `;
            document.getElementById('alert-container').innerHTML = alert;
            // Redirect user to root URL
            window.location.href = "/";
        },
        // Callback function to execute when error occurs
        error: function (xhr, status, error) {
            // console.log(xhr.responseJSON.error);
            let alert_text = "";
            
            // Check if there is any error for name 
            if(xhr.responseJSON.error.name){
                alert_text += `
                <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:" style="height: 13px">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg>
                ${xhr.responseJSON.error.name[0]}<br>`;
            }
            
            // Check if there is any error for email
            if(xhr.responseJSON.error.email){
                alert_text += `
                <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:" style="height: 13px">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg>
                ${xhr.responseJSON.error.email[0]}<br>`;
            }

            // Check if there is any error for password
            if(xhr.responseJSON.error.password){
                alert_text += `
                <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:" style="height: 13px">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg>
                ${xhr.responseJSON.error.password[0]}`;
            }
            
            // Attaching the alert if present
            let alert = `
            <div class="alert alert-danger alert-dismissible fade show" role="alert" >
                ${alert_text}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            `;
            document.getElementById('alert-container').innerHTML = alert;
        },
    });
});
