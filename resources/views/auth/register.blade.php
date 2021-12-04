@extends('layouts.app')

@section('title', 'Register')
@section('content')
<div class="container bg-transparent">
    <div class="px-5 py-3 position-absolute top-50 start-50 translate-middle shadow-lg rounded-3 my-4 bg-white w-25">
        <h3 class="text-center text-custom-4 mb-4">Register</h3>
        <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="nameInput" class="form-label text-custom-4">Name</label>
                <input type="text" class="form-control" id="nameInput" name="name">
            </div>
            <div class="mb-3">
                <label for="emailInput" class="form-label text-custom-4">Email</label>
                <input type="email" class="form-control" id="emailInput" name="email">
            </div>
            <div class="mb-3">
                <label for="passwordInput" class="form-label text-custom-4">Password</label>
                <input type="password" class="form-control" id="passwordInput" name="password">
            </div>
            <div class="mb-3">
                <label for="passwordInput" class="form-label text-custom-4">Re-type Password</label>
                <input type="password" class="form-control" id="passwordInput" name="password_confirmation">
            </div>
            <div class="row gx-0 justify-content-between my-4 gy-3">
                <a class="btn btn-sm bg-custom-4 col-md-5 text-white" href="{{ route('login') }}">Login</a>
                <button class="btn btn-sm bg-custom-4 col-md-5 text-white" type="submit">Register</button>
            </div>
        </form>
    </div>
</div>
@endsection
