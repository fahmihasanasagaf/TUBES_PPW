<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register Admin - A Mitra Furniture</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background:#eef6ff">

<div class="container">
    <div class="row justify-content-center align-items-center" style="min-height:100vh; padding:20px 0">
        <div class="col-md-5">
            <div class="card shadow">
                <div class="card-body text-center">
                    <h4 class="mb-3">REGISTER ADMIN</h4>
                    <p class="text-muted">A Mitra Furniture</p>

                    <form method="POST" action="{{ route('admin.register.store') }}">
                        @csrf

                        <div class="mb-3 text-start">
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                placeholder="Nama Lengkap" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 text-start">
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                placeholder="Email Admin" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 text-start">
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                                placeholder="Password (minimal 8 karakter)" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 text-start">
                            <input type="password" name="password_confirmation" class="form-control"
                                placeholder="Konfirmasi Password" required>
                        </div>

                        <button class="btn btn-primary w-100">Daftar Admin</button>
                    </form>

                    @if($errors->any() && !$errors->has('name') && !$errors->has('email') && !$errors->has('password'))
                        <div class="alert alert-danger mt-3">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <div class="mt-3">
                        <p class="text-muted small">Sudah punya akun admin?</p>
                        <a href="{{ route('admin.login') }}" class="btn btn-outline-secondary w-100">
                            Login Admin
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
