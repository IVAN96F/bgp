<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Maven Pro' rel='stylesheet'>
    <style>
        body {
            background-color: #fff8ee;
            font-family: 'Maven Pro';
        }

        .profile-form-container {
            background-color: #ffffff;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.08);
            width: 100%;
            max-width: 600px;
        }

        .form-label {
            font-weight: 500;
        }

        .btn-primary {
            background-color: #f9C46E;
            border: none;
            color: #333;
        }

        .btn-primary:hover {
            background-color: #f5b956;
            color: #222;
        }

        .btn-secondary {
            background-color: #e0e0e0;
            border: none;
            color: #333;
        }

        h3 {
            color: #d58f00;
            font-weight: 600;
        }

        .alert-success {
            background-color: #fff3cd;
            border-color: #ffeeba;
            color: #856404;
        }
    </style>
</head>

<body>
    <div class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="profile-form-container">
            <h3 class="mb-4 text-center">Edit Profil</h3>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                </div>

                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="{{ old('username', $user->username) }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password Baru (opsional)</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <a href="{{ route('profile') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
