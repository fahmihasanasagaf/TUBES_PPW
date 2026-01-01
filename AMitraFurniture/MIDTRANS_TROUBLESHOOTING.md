# Fix: Midtrans QRIS/Payment Popup Tidak Muncul

## Masalah yang Ditemukan

1. **SSL Certificate Error** ✅ FIXED
   - Error: "CURL Error: SSL peer certificate or SSH remote key was not OK"
   - Solusi: Membuat custom helper dengan SSL verification disabled untuk development

2. **Credentials Error** ⚠️ PERLU ACTION
   - Error: "Access denied due to unauthorized transaction"
   - Status: Credentials di `.env` tidak valid atau kadaluarsa

## Solusi yang Sudah Diterapkan

### 1. MidtransHelper (SSL Fix)
File: `app/Helpers/MidtransHelper.php`

Helper ini bypass SSL verification untuk development environment:
- Menggunakan custom CURL dengan `CURLOPT_SSL_VERIFYPEER => false`
- Wrapper untuk Midtrans Snap API
- Hanya untuk development/testing

### 2. OrderController Updated  
- Menggunakan `MidtransHelper::getSnapToken()` instead of `Midtrans\Snap::getSnapToken()`
- Error handling yang lebih baik
- Try-catch untuk semua Midtrans API calls

### 3. Payment Page dengan Debugging
File: `resources/views/dashboard/payment-page.blade.php`
- Console log untuk debugging
- Check jika Snap library ter-load
- Check jika token tersedia
- Alert error messages yang lebih informatif

## ACTION REQUIRED: Update Midtrans Credentials

### Langkah-langkah:

#### 1. Daftar/Login ke Midtrans Sandbox
- Buka: https://dashboard.sandbox.midtrans.com/
- Login atau buat akun baru

#### 2. Dapatkan Credentials Baru
- Di dashboard, buka menu **Settings** > **Access Keys**
- Copy credentials berikut:
  - **Merchant ID**
  - **Client Key** (dimulai dengan `SB-Mid-client-...`)
  - **Server Key** (dimulai dengan `SB-Mid-server-...`)

#### 3. Update File .env
Edit file `.env` dan ganti dengan credentials baru:

```env
MIDTRANS_MERCHANT_ID=G123456789
MIDTRANS_CLIENT_KEY=SB-Mid-client-xxxxxxxxxxxxxx
MIDTRANS_SERVER_KEY=SB-Mid-server-xxxxxxxxxxxxxx
MIDTRANS_IS_PRODUCTION=false
```

⚠️ **PENTING**: 
- Untuk Sandbox, pastikan credentials dimulai dengan `SB-`
- Jangan gunakan credentials production untuk testing

#### 4. Clear Cache
```bash
php artisan config:clear
php artisan cache:clear
```

#### 5. Test Connection
```bash
php public/test-midtrans.php
```

Jika berhasil, akan muncul:
```
✅ SUCCESS!
Snap Token: xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx
```

## Testing Payment

### A. Test Menggunakan Test Script
```bash
php public/test-midtrans.php
```

### B. Test di Browser
1. Jalankan server: `php artisan serve`
2. Login ke aplikasi
3. Tambah produk ke cart
4. Checkout
5. Klik tombol "Bayar Sekarang"
6. Popup Midtrans akan muncul

### C. Test Card Numbers (Sandbox)

**Credit Card:**
```
Card Number: 4811 1111 1111 1114
Exp: 01/25
CVV: 123
OTP: 112233
```

**GoPay/QRIS:**
- Akan generate QR Code atau redirect ke simulasi
- Approve di halaman simulasi

**Bank Transfer:**
- Virtual Account akan dibuat
- Simulasi pembayaran di dashboard Midtrans

## Troubleshooting

### Popup Tidak Muncul
1. **Buka Console Browser** (F12 > Console)
2. **Check Log Messages:**
   ```javascript
   Snap loaded: true/false
   Client Key: SB-Mid-client-...
   Snap Token: ...
   ```
3. **Jika Snap loaded: false**
   - Refresh halaman
   - Check network tab untuk error loading snap.js
   
4. **Jika Token kosong**
   - Check logs server (terminal)
   - Pastikan credentials sudah benar
   - Check error message di redirect back

### Error 401: Unauthorized
- Credentials salah atau kadaluarsa
- Dapatkan credentials baru dari dashboard
- Pastikan menggunakan Sandbox credentials (dengan prefix `SB-`)

### Error 400: Bad Request
- Format parameter salah
- Check console untuk detail error
- Pastikan semua required fields terisi (alamat, nomor telepon)

### Popup Muncul Tapi Tidak Bisa Bayar
- Normal untuk sandbox
- Gunakan test card numbers di atas
- Check status payment di dashboard Midtrans

## Production Deployment

⚠️ **SEBELUM KE PRODUCTION:**

1. **Dapatkan Production Credentials**
   - Login ke https://dashboard.midtrans.com/ (bukan sandbox)
   - Verifikasi bisnis
   - Dapatkan production credentials

2. **Update .env**
   ```env
   MIDTRANS_IS_PRODUCTION=true
   MIDTRANS_CLIENT_KEY=Mid-client-xxxxxx (tanpa SB-)
   MIDTRANS_SERVER_KEY=Mid-server-xxxxxx (tanpa SB-)
   ```

3. **Update Snap Script URL**
   Di `payment-page.blade.php`, ganti:
   ```html
   <!-- Dari -->
   <script src="https://app.sandbox.midtrans.com/snap/snap.js"></script>
   
   <!-- Ke -->
   <script src="https://app.midtrans.com/snap/snap.js"></script>
   ```

4. **Enable SSL Verification**
   Di `app/Helpers/MidtransHelper.php`:
   ```php
   // Ganti:
   CURLOPT_SSL_VERIFYPEER => false,
   CURLOPT_SSL_VERIFYHOST => false,
   
   // Dengan:
   CURLOPT_SSL_VERIFYPEER => true,
   CURLOPT_SSL_VERIFYHOST => 2,
   ```

5. **Setup Webhook URL**
   - Di dashboard Midtrans > Settings > Configuration
   - Payment Notification URL: `https://yourdomain.com/payment/callback`
   - Pastikan server bisa menerima POST request dari Midtrans

## File-file yang Dimodifikasi

1. ✅ `app/Helpers/MidtransHelper.php` - Custom helper with SSL fix
2. ✅ `app/Http/Controllers/OrderController.php` - Updated to use helper
3. ✅ `resources/views/dashboard/payment-page.blade.php` - Added debugging
4. ✅ `public/test-midtrans.php` - Test script

## Support

- Dokumentasi Midtrans: https://docs.midtrans.com/
- Dashboard Sandbox: https://dashboard.sandbox.midtrans.com/
- Dashboard Production: https://dashboard.midtrans.com/
