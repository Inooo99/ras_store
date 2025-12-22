@section('title', 'Login - RAS STORE')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow p-4">
                <h3 class="text-center mb-4 fw-bold">Login</h3>@if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ url('/login') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <button class="btn btn-dark w-100">Login</button>
            </form>

            <p class="text-center mt-3 small">
                Belum punya akun? <a href="{{ url('/register') }}">Daftar sekarang</a>
            </p>
        </div>
    </div>
</div>

</div>
@endsection<!-- resources/views/auth/register.blade.php -->@extends('layout2')

