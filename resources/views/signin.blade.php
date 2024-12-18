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
      <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    OR
    <a class="w-100 mt-2 btn btn-lg btn-success" type="submit" href="{{route('signup')}}">Sign up</a>
    <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
  </form>
</main>
@endsection

@section('signin_js')
  <script>
    console.log('hello');
    
  </script>
@endsection