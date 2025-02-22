@extends('layouts.auth')

@section('title', 'Login')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="mb-3 text-start">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" class="form-control @error('username') is-invalid @enderror" placeholder="Masukkan Username" required>
            @error('username') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3 text-start">
            <label for="password">Kata Sandi</label>
            <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan kata sandi" required>
            @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn auth-btn">Login</button>
    </form>
    <p class="mt-3 auth-link">
        Belum Punya Akun? <a href="{{ route('register') }}">Klik Di sini</a>
    </p>
@endsection
