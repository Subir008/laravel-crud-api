// Get the form element with the id 'addform'
var addform = document.querySelector("#addform");

// Add an event listener to the form's submit event
addform.onsubmit =  (e) => {
    // Prevent the default form submission behavior
    e.preventDefault();

    // Retrieve the API token from local storage
    const token = localStorage.getItem("api_token");

    // Get the values of the form fields
    let name = document.querySelector("#name").value;
    let description = document.querySelector("#description").value;
    let image = document.querySelector("#image").files[0];

    // Create a new FormData object to hold the form data
    var formdata = new FormData();

    // Append the form field values to the FormData object
    formdata.append("name", name);
    formdata.append("description", description);

    // Append the image file to the FormData object
    formdata.append("image", image);
    
    // Send a POST request to the API endpoint with the form data
    let response =  fetch("/api/post", {
        // Set the request method to POST
        method: "POST",
        // Set the request body to the FormData object
        body: formdata,
        // Set the Authorization header with the API token
        headers: {
            Authorization: `Bearer ${token}`,
        },
    })
    // Parse the response as JSON
    .then(response => response.json())
        .then((data) => {
            // console.log(data);
            if(data.status == false){
                alert(data.error);
            }
            window.location.href = '/home' ;
        });
};

