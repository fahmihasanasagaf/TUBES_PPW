# Panduan Setup Google OAuth Login

## 📋 Persiapan

Fitur login Google sudah diimplementasikan di aplikasi Laravel ini. Untuk menggunakannya, Anda perlu mengkonfigurasi Google OAuth credentials.

## 🔧 Langkah-langkah Setup

### 1. Buat Proyek di Google Cloud Console

1. Buka [Google Cloud Console](https://console.cloud.google.com/)
2. Login dengan akun Google Anda
3. Klik **Select a project** → **NEW PROJECT**
4. Masukkan nama proyek (misalnya: "AMitra Furniture")
5. Klik **CREATE**

### 2. Aktifkan Google+ API

1. Di dashboard project Anda, pilih **APIs & Services** → **Library**
2. Cari "**Google+ API**" atau "**Google OAuth2 API**"
3. Klik pada API tersebut
4. Klik tombol **ENABLE**

### 3. Buat OAuth 2.0 Credentials

1. Pilih **APIs & Services** → **Credentials**
2. Klik **+ CREATE CREDENTIALS** → **OAuth client ID**
3. Jika diminta, konfigurasikan **OAuth consent screen** terlebih dahulu:
   - Pilih **External** (untuk testing)
   - Isi **App name**: A Mitra Furniture
   - Isi **User support email**: email Anda
   - Isi **Developer contact information**: email Anda
   - Klik **SAVE AND CONTINUE**
   - Di bagian **Scopes**, tambahkan scopes:
     - `.../auth/userinfo.email`
     - `.../auth/userinfo.profile`
   - Klik **SAVE AND CONTINUE**
   - Di bagian **Test users**, tambahkan email untuk testing
   - Klik **SAVE AND CONTINUE**

4. Kembali ke **Credentials** → **+ CREATE CREDENTIALS** → **OAuth client ID**
5. Pilih **Application type**: **Web application**
6. Masukkan **Name**: AMitra Furniture Web Client
7. Di **Authorized JavaScript origins**, tambahkan:
   ```
   http://localhost
   http://localhost:8000
   ```
8. Di **Authorized redirect URIs**, tambahkan:
   ```
   http://localhost:8000/auth/google/callback
   ```
9. Klik **CREATE**
10. **PENTING**: Simpan **Client ID** dan **Client Secret** yang muncul

### 4. Konfigurasi .env File

1. Buka file `.env` di root project Laravel
2. Cari bagian Google OAuth Credentials:
   ```env
   GOOGLE_CLIENT_ID=your-google-client-id.apps.googleusercontent.com
   GOOGLE_CLIENT_SECRET=your-google-client-secret
   GOOGLE_REDIRECT_URL="${APP_URL}/auth/google/callback"
   ```
3. Ganti dengan credentials yang Anda dapatkan:
   ```env
   GOOGLE_CLIENT_ID=123456789-abcdefghijklmnop.apps.googleusercontent.com
   GOOGLE_CLIENT_SECRET=GOCSPX-aBcDeFgHiJkLmNoPqRsTuVwXyZ
   GOOGLE_REDIRECT_URL="${APP_URL}/auth/google/callback"
   ```

### 5. Jalankan Aplikasi

```bash
php artisan serve
```

Buka browser dan akses: `http://localhost:8000/login`

## ✅ Testing

1. Klik tombol **Google** di halaman login
2. Pilih akun Google yang sudah ditambahkan sebagai test user
3. Berikan izin akses
4. Anda akan diarahkan kembali ke aplikasi dan otomatis login

## 🔒 Keamanan

- **Jangan commit** file `.env` ke Git
- **Jangan share** Client Secret Anda
- Untuk production, ubah OAuth consent screen ke **Internal** atau **Public** setelah verifikasi

## 📝 Catatan

- User yang login dengan Google tidak perlu password
- Jika email sudah terdaftar, akun akan otomatis di-link dengan Google
- Avatar dari Google akan disimpan otomatis
- Email akan otomatis terverifikasi

## 🎨 Fitur yang Sudah Diimplementasikan

✅ Login dengan Google
✅ Auto-register user baru
✅ Link existing account dengan Google
✅ Simpan avatar dari Google
✅ Auto email verification
✅ Redirect ke home setelah login

## 🚨 Troubleshooting

### Error: "redirect_uri_mismatch"
- Pastikan URL callback di Google Console sama persis dengan yang di aplikasi
- URL harus: `http://localhost:8000/auth/google/callback`

### Error: "Access blocked: This app's request is invalid"
- Pastikan Google+ API sudah diaktifkan
- Pastikan email Anda sudah ditambahkan sebagai test user

### Error: "Client ID not found"
- Cek kembali GOOGLE_CLIENT_ID di file .env
- Pastikan tidak ada spasi atau karakter tersembunyi

### Tombol Google tidak berfungsi
- Pastikan sudah menjalankan `php artisan serve`
- Clear browser cache
- Cek console browser untuk error JavaScript

## 📚 Referensi

- [Laravel Socialite Documentation](https://laravel.com/docs/socialite)
- [Google OAuth 2.0 Guide](https://developers.google.com/identity/protocols/oauth2)
