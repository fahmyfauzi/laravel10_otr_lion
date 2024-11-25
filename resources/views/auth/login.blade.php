@extends('layouts.auth')
@section('title', 'Login')
@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form action="{{ route('login.store') }}" method="POST">
        @csrf
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

        {{-- @error('error') --}}
        @if ($errors->any())
            <div class="alert alert-danger mt-2 text-start">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
        @endif

        <div class="form-floating mb-2">
            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com"
                required>
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating mb-2">
            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password"
                required>
            <label for="floatingPassword">Password</label>
        </div>
        <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
        <p class="mt-3 text-center">
            Don't have an account? <a href="{{ route('register') }}">Register</a>
        </p>
    </form>
@endsection
