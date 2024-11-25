@extends('layouts.auth')
@section('title', 'Register')
@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form action="{{ route('register.store') }}" method="POST">
        @csrf
        <h1 class="h3 mb-3 fw-normal">Please register</h1>

        @if ($errors->any())
            <div class="alert alert-danger mt-2 text-start">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <div class="form-floating mb-2">
            <input type="text" name="name" class="form-control" id="floatingName" placeholder="Your Name" required>
            <label for="floatingName">Name</label>
        </div>
        <div class="form-floating mb-2">
            <input type="email" name="email" class="form-control" id="floatingEmail" placeholder="name@example.com"
                required>
            <label for="floatingEmail">Email address</label>
        </div>
        <div class="form-floating mb-2">
            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password"
                required>
            <label for="floatingPassword">Password</label>
        </div>
        <div class="form-floating mb-2">
            <input type="password" name="password_confirmation" class="form-control" id="floatingPasswordConfirm"
                placeholder="Confirm Password" required>
            <label for="floatingPasswordConfirm">Confirm Password</label>
        </div>

        <button class="btn btn-primary w-100 py-2" type="submit">Register</button>
        <p class="mt-3 text-center">
            Already have an account? <a href="{{ route('login') }}">Sign in</a>
        </p>
    </form>
@endsection
