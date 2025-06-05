<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }

        .form-signin {
            max-width: 400px;
            padding: 20px;
            margin: auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .form-floating+.form-floating {
            margin-top: 1rem;
        }

        .btn-danger {
            font-size: 0.75rem;
            margin-top: 5px;
        }
    </style>
</head>

<body>
    <main class="form-signin">
        <form action="{{ route('regis.store') }}" method="POST">
            @csrf
            <h1 class="h3 mb-3 fw-bold text-center">Daftar Akun</h1>

            <div class="form-floating">
                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                    placeholder="Nama Lengkap" value="{{ old('name') }}">
                <label for="name">Nama Lengkap</label>
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-floating mt-3">
                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror"
                    placeholder="Email" value="{{ old('email') }}">
                <label for="email">Alamat Email</label>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-floating mt-3">
                <input type="password" id="password" name="password"
                    class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                <label for="password">Kata Sandi</label>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">Daftar</button>

            <small class="d-block text-center mt-3">
                Sudah punya akun? <a href="{{ route('login') }}">Login Sekarang</a>
            </small>
        </form>
    </main>
</body>

</html>