<!-- Inherting layout -->
@extends('components/layout')

<!-- Title section -->
@section('title', 'Sign up')

<!-- Main section -->
@section('main')
<main class="form-signin pt-5">
    <form>

        <h1 class="h3 mb-3 fw-normal">New Here, <br> Sign Up Now</h1>

        <div class="form-floating">
            <input type="text" class="form-control" id="name" placeholder="">
            <label for="name">Name</label>
        </div>
        <div class="form-floating">
            <input type="email" class="form-control" id="email" placeholder="name@example.com">
            <label for="email">Email address</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="password" placeholder="Password">
            <label for="password">Password</label>
        </div>

        <a class="w-100 mt-2 btn btn-lg btn-warning" type="submit" href="{{route('signup')}}">Submit</a>
        <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
    </form>
</main>
@endsection