<!-- Inherting layout -->
@extends('components/layout')

<!-- Title section -->
@section('title', 'Sign in')

<!-- Main section -->
@section('main')
<main class="form-signin pt-5">
  <form>
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
    <div class="form-floating">
      <input type="email" class="form-control" id="email" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="password" placeholder="Password" autocomplete="off">
      <label for="floatingPassword">Password</label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit" id="signinbtn">Sign in</button>
    OR
    <a class="w-100 mt-2 btn btn-lg btn-success" type="submit" href="{{route('signup')}}">Sign up</a>
    <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
  </form>
</main>
@endsection

@section('signin_js')
  <script>
    $(document).ready(function () {
      $('#signinbtn').on("click" , function(e){
        e.preventDefault();

        // Gettig the data from the form done using 2 ways
        let email =$('#email').val();
        let password =$('#password').val();
        // let email =document.getElementById('email').value;
        
        $.ajax({
          url : '/api/login',
          type : 'POST',
          contentType : 'application/json',
          data :JSON.stringify({
            email :email,
            password : password
          }),
          success :function(response){
            console.log(response);
            
            localStorage.setItem('api_token' , response.token);
            window.location.href = '/home';

          },
          error :function(xhr,status,error){
            console.log(status);
            alert("Error : " +xhr.responseJSON['message']);
          }

        });
        
      });
    });
    
  </script>
@endsection