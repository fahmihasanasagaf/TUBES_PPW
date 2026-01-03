<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - A Mitra Furniture</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <!-- Header/Navbar -->
    <nav class="navbar navbar-expand-lg app-header sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">A Mitra Furniture</a>
        </div>
    </nav>

    <div id="login-screen" class="screen active">
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="text-center mb-4">
                        <i class="fas fa-chair fa-4x mb-3" style="color: #429ff7;"></i>
                        <h2>Login</h2>
                        <p>Hallo! Selamat datang kembali..</p>
                    </div>
                    
            
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

    
                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif
                    
            
                    <form action="{{ route('login.store') }}" method="POST">
                        @csrf 
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Email</label>
                            <input 
                                type="email" 
                                name="email" 
                                class="form-control @error('email') is-invalid @enderror" 
                                placeholder="Example@gmail.com" 
                                value="{{ old('email') }}"
                                required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Kata sandi</label>
                            <input 
                                type="password" 
                                name="password" 
                                class="form-control @error('password') is-invalid @enderror" 
                                placeholder="Masukkan kata sandi" 
                                required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3 text-end">
                            <a href="#" class="text-link">Lupa sandi</a>
                        </div>
                        
                        {{-- Submit Button --}}
                        <button type="submit" class="btn btn-login w-100 mb-4">
                            Login
                        </button>
                        
                        <div class="text-center mb-3">
                            <p>Atau masuk dengan</p>
                        </div>
                        
                        <div class="row justify-content-center mb-4">
                            <div class="col-auto">
                                @if(config('services.google.client_id') && config('services.google.client_id') != 'your-google-client-id.apps.googleusercontent.com')
                                    <a href="{{ route('auth.google') }}" class="social-login" title="Login dengan Google">
                                        <i class="fab fa-google"></i>
                                    </a>
                                @else
                                    <div class="social-login" onclick="alert('Google OAuth belum dikonfigurasi. Silakan setup credentials di Google Cloud Console terlebih dahulu.\n\nLihat file GOOGLE_OAUTH_SETUP.md untuk panduan lengkap.')" style="opacity: 0.6; cursor: not-allowed;">
                                        <i class="fab fa-google"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="col-auto">
                                <div class="social-login" onclick="alert('Fitur WhatsApp login belum tersedia')">
                                    <i class="fab fa-whatsapp"></i>
                                </div>
                            </div>
                        </div>
                        
                        <div class="text-center">
                            <p>
                                Belum punya akun? 
                                <a href="{{ route('register') }}" class="text-link">Daftar</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>