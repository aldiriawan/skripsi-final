@extends('login.layouts.main')

@section('container')
<div class="row justify-content-center align-items-center" style="height: 100vh; margin: 0; background: linear-gradient(135deg, #72EDF2 10%, #5151E5 100%); background-position: center top; background-size: cover;">
    <div class="col-md-4">
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if (session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="card shadow-lg p-4 mb-5 bg-white rounded-3" style="max-width: 400px;">
            <div class="card-body">
                <div class="text-center mb-4">
                    <img src="img/favicon.png" alt="Logo" style="width: 100px;">
                </div>
                <h1 class="h4 mb-3 text-center">Login to Your Account</h1>
                <form action="/login" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Enter your username" value="{{ old('username') }}" required>
                        @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" required>
                    </div>
                    <button class="btn btn-primary w-100 py-2 btn-hover-effect" type="submit">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .btn-hover-effect {
        transition: background-color 0.3s, transform 0.3s;
    }
    .btn-hover-effect:hover {
        background-color: #333;
        transform: scale(1.05);
    }
    .form-control:focus {
        border-color: #72EDF2;
        box-shadow: 0 0 5px rgba(114, 237, 242, 0.5);
    }
</style>
@endsection
