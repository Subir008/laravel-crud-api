$(document).ready(function () {
    $('#signinbtn').on("click" , function(e){
      e.preventDefault();

      // Gettig the data from the form done using 2 ways
      let email =$('#email').val();
      let password =$('#password').val();
      // let email =document.getElementById('email').value;
      
       // Send a POST request to the server to authenticate the user
      $.ajax({
        // Specify the URL of the server-side endpoint to handle the request
        url : '/api/login',
        // Specify the request method
        type : 'POST',
        contentType : 'application/json',
        // Pass the email and password as data in the request body
        data :JSON.stringify({
          email :email,
          password : password
        }),
        success :function(response){
        //   console.log(response);
          
          localStorage.setItem('api_token' , response.token);
          window.location.href = '/home';
        },
        error :function(xhr,status,error){
          // console.log(xhr.responseJSON);
        let alert_text = "";
        
        if(xhr.responseJSON.error){
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
        }else{
          alert_text += `
              <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:" style="height: 13px">
              <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
              </svg>
              ${xhr.responseJSON.message}<br>`;  
        }
        
        // Attaching the alert if present
        let alert = `
        <div class="alert alert-danger alert-dismissible fade show" role="alert" >
            ${alert_text}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        `;
        document.getElementById('alert-container').innerHTML = alert;
        }

      });
      
    });
  });
 