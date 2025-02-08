<!-- Inherting layout -->
@extends('components/layout')

<!-- Title section -->
@section('title', 'Sign in')

<!-- Main section -->
@section('main')
<div id="alert-container" class="container-fluid col-12" style="position:relative; top: 15px;"></div>
<main class="form-signin pt-5 text-center">
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
    <!-- <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p> -->
  </form>
</main>
@endsection

@section('signin_js')
  <script src="js/signin.js"></script>
@endsection