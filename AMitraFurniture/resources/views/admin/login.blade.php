<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin - A Mitra Furniture</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background:#eef6ff">

<div class="container">
    <div class="row justify-content-center align-items-center" style="height:100vh">
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body text-center">
                    <h4 class="mb-3">LOGIN ADMIN</h4>
                    <p class="text-muted">A Mitra Furniture</p>

                    <form method="POST" action="{{ route('admin.login.store') }}">
                        @csrf

                        <input type="email" name="email" class="form-control mb-3"
                            placeholder="Email Admin" required>

                        <input type="password" name="password" class="form-control mb-3"
                            placeholder="Password" required>

                        <button class="btn btn-primary w-100">Login</button>
                    </form>

                    @if($errors->any())
                        <div class="alert alert-danger mt-3">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <div class="mt-3">
                        <p class="text-muted small">Belum punya akun admin?</p>
                        <a href="{{ route('admin.register') }}" class="btn btn-outline-primary w-100">
                            Daftar Admin Baru
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
