# Cara Mendapatkan Credentials Midtrans Sandbox yang Valid

## ⚠️ Masalah: Error 401 Unauthorized

Credentials yang ada di `.env` sudah **tidak valid** atau **kadaluarsa**.

```
MIDTRANS_SERVER_KEY=Mid-server-your_server_key_here
```

Error yang muncul:
```
❌ ERROR! Status Code: 401
Error: Unauthorized (401)
Credentials tidak valid!
```

## ✅ Solusi: Dapatkan Credentials Baru

### Langkah 1: Buka Dashboard Midtrans Sandbox
Kunjungi: **https://dashboard.sandbox.midtrans.com/**

### Langkah 2: Login atau Daftar Akun Baru

#### Jika Belum Punya Akun:
1. Klik **"Sign Up"**
2. Isi form registrasi:
   - Email
   - Password
   - Nama Bisnis
3. Verifikasi email
4. Login ke dashboard

#### Jika Sudah Punya Akun:
1. Klik **"Login"**
2. Masukkan email & password
3. Masuk ke dashboard

### Langkah 3: Dapatkan Access Keys

1. **Di Dashboard**, klik menu **Settings** (⚙️) di sidebar kiri
2. Pilih **Access Keys**
3. Anda akan melihat credentials berikut:

   ```
   Merchant ID: G123456789
   Client Key: SB-Mid-client-xxxxxxxxxxxxxxxxxxxxx
   Server Key: SB-Mid-server-xxxxxxxxxxxxxxxxxxxxx
   ```

4. **PENTING**: Credentials Sandbox dimulai dengan prefix **`SB-`**

### Langkah 4: Copy Credentials

**Copy ketiga credentials:**
- ✅ Merchant ID
- ✅ Client Key (dimulai dengan `SB-Mid-client-`)
- ✅ Server Key (dimulai dengan `SB-Mid-server-`)

### Langkah 5: Update File `.env`

Buka file `.env` di root project dan update:

```env
MIDTRANS_MERCHANT_ID=G123456789
MIDTRANS_CLIENT_KEY=SB-Mid-client-xxxxxxxxxxxxxxxxxxxxx
MIDTRANS_SERVER_KEY=SB-Mid-server-xxxxxxxxxxxxxxxxxxxxx
MIDTRANS_IS_PRODUCTION=false
```

⚠️ **Ganti `xxxxx...` dengan credentials Anda yang sebenarnya!**

### Langkah 6: Clear Cache Laravel

```bash
php artisan config:clear
php artisan cache:clear
```

### Langkah 7: Test Credentials

#### Menggunakan PowerShell Script:
```powershell
powershell -ExecutionPolicy Bypass -File .\test-midtrans.ps1
```

#### Menggunakan PHP Script:
```bash
php public/test-midtrans.php
```

Jika berhasil, akan muncul:
```
✅ SUCCESS!
Snap Token: xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx
Redirect URL: https://app.sandbox.midtrans.com/snap/v2/vtweb/...
```

### Langkah 8: Test di Browser

1. Start server Laravel:
   ```bash
   php artisan serve
   ```

2. Buka browser: **http://localhost:8000**

3. **Login ke aplikasi**

4. **Tambah produk ke cart**

5. **Checkout** dan isi:
   - Alamat pengiriman
   - Nomor telepon

6. **Klik "Lanjutkan ke Pembayaran"**

7. Di halaman payment, **klik "Bayar Sekarang"**

8. **Popup Midtrans Snap akan muncul!** 🎉

## 🧪 Test Payment Methods

### Credit Card (Sandbox):
```
Card Number: 4811 1111 1111 1114
Exp Date: 01/25
CVV: 123
OTP/3DS: 112233
```

### GoPay/QRIS:
- Akan generate QR Code
- Scan dengan GoPay app (sandbox mode)
- Atau approve di halaman simulasi

### Bank Transfer:
- Virtual Account akan dibuat otomatis
- Copy nomor VA
- Simulasi pembayaran di **Dashboard Midtrans > Transactions**

## 📋 Checklist

- [ ] Daftar/Login ke Midtrans Sandbox
- [ ] Dapatkan Merchant ID, Client Key, Server Key
- [ ] Update file `.env`
- [ ] Clear cache Laravel
- [ ] Test dengan script (PowerShell atau PHP)
- [ ] Test di browser (checkout flow)
- [ ] Popup Midtrans muncul!

## 🚨 Troubleshooting

### Script masih error 401 setelah update credentials?
1. Pastikan credentials di-copy dengan benar (no extra spaces)
2. Clear cache lagi: `php artisan config:clear`
3. Restart Laravel server

### Popup masih tidak muncul?
1. Buka Console Browser (F12 > Console)
2. Check error messages
3. Pastikan Client Key juga sudah di-update
4. Check file: `resources/views/dashboard/payment-page.blade.php`

### Credentials sudah benar tapi masih error?
1. Pastikan koneksi internet stabil
2. Try disable VPN jika sedang menggunakan
3. Check status Midtrans: https://status.midtrans.com/

## 📞 Support

- **Midtrans Documentation**: https://docs.midtrans.com/
- **Sandbox Dashboard**: https://dashboard.sandbox.midtrans.com/
- **Midtrans Support**: support@midtrans.com

## ⚙️ Files yang Sudah Disiapkan

✅ **test-midtrans.ps1** - PowerShell script untuk test API
✅ **public/test-midtrans.php** - PHP script untuk test API
✅ **app/Helpers/MidtransHelper.php** - Helper dengan SSL fix
✅ **MIDTRANS_TROUBLESHOOTING.md** - Complete guide
✅ **MIDTRANS_INTEGRATION.md** - Integration docs

Setelah update credentials, semua akan berfungsi dengan baik! 🚀
