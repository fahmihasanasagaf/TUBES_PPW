# ⚠️ PENTING: Cara Mengambil Credentials Sandbox yang Benar

## 🚨 Masalah yang Anda Alami

Credentials di `.env` Anda:
```
MIDTRANS_CLIENT_KEY=Mid-client-xxxxx  ❌ SALAH (tidak ada SB-)
MIDTRANS_SERVER_KEY=Mid-server-xxxxx  ❌ SALAH (tidak ada SB-)
```

Credentials yang BENAR untuk Sandbox harus seperti ini:
```
MIDTRANS_CLIENT_KEY=SB-Mid-client-xxxxx  ✅ BENAR (ada SB-)
MIDTRANS_SERVER_KEY=SB-Mid-server-xxxxx  ✅ BENAR (ada SB-)
```

## 🎯 Solusi: Switch ke Mode SANDBOX di Dashboard

### ⚠️ PENTING: Hanya Ada SATU Dashboard!

Midtrans menggunakan **satu dashboard** di:
```
https://dashboard.midtrans.com/
```

Di dalam dashboard tersebut, ada **toggle untuk switch** antara:

1. **❌ PRODUCTION Mode:**
   - Credentials: `Mid-client-xxx` (TANPA SB-)
   - Untuk transaksi REAL dengan uang sungguhan
   
2. **✅ SANDBOX Mode:**
   - Credentials: `SB-Mid-client-xxx` (DENGAN SB-)
   - Untuk testing/development

## 📋 Langkah-Langkah yang BENAR

### Step 1: Buka Dashboard Midtrans
Buka URL:
```
https://dashboard.midtrans.com/
```
**PENTING**: Hanya ada satu dashboard ini saja!

### Step 2: Login atau Daftar
- Jika belum punya akun, klik **Sign Up**
- Isi email dan password
- Login ke dashboard

### Step 3: Switch ke Sandbox Mode
**INI LANGKAH PALING PENTING!**
1. Setelah login, lihat **pojok kanan atas** dashboard
2. Cari toggle/switch yang menunjukkan **"Production"** atau **"Sandbox"**
3. **KLIK toggle tersebut** dan pilih **"Sandbox"** atau **"Test"**
4. Pastik5n toggle sudah menunjukkan mode **SANDBOX**

### Step 4: Masuk ke Settings > Access Keys
1. Di sidebar kiri, klik icon **⚙️ Settings**
2. Pilih menu **Access Keys**
3. Sekarang Anda akan melihat credentials Sandbox!

### Step 4: Copy Credentials yang BENAR
Anda akan melihat:

```
Environment: SANDBOX  ← Pastikan ini tertulis SANDBOX!

Merchant ID: Gxxxxxxxxx
Client Key: SB-Mid-client-xxxxxxxxxxxxxx  ← Harus ada SB-
Server Key: SB-Mid-server-xxxxxxxxxxxxxx  ← Harus ada SB-
```

**Ciri-ciri credentials Sandbox yang BENAR:**
- ✅ Client Key dimulai dengan: `SB-Mid-client-`
- ✅ Server Key dimulai dengan: `SB-Mid-server-`
- ✅ Ada tulisan "SANDBOX" atau "Sandbox Mode" di dashboard

### Step 6: Update .env dengan Credentials Sandbox

Edit file `.env`:

```env
# Ganti dengan credentials SANDBOX Anda
MIDTRANS_MERCHANT_ID=G123456789
MIDTRANS_CLIENT_KEY=SB-Mid-client-xxxxxxxxxxxxxx
MIDTRANS_SERVER_KEY=SB-Mid-server-xxxxxxxxxxxxxx
MIDTRANS_IS_PRODUCTION=false
```

### Step 7: Clear Cache
```bash
php artisan config:clear
```

### Step 8: Test Lagi
```bash
php public/test-midtrans.php
```

Jika berhasil, akan muncul:
```
✅ SUCCESS!
Snap Token: xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx
```

## 🔍 Cara Memastikan Anda di Sandbox yang Benar

### Cek Toggle di Pojok Kanan Atas
- Harus menunjukkan **"Sandbox"** atau **"Test Mode"**
- JANGAN mode **"Production"**!

### Cek Banner Dashboard
Di dashboard Sandbox biasanya ada badge/label **"SANDBOX"** atau **"TEST MODE"** dengan warna berbeda (biasanya kuning/orange)

### Cek Credentials
- Sandbox credentials: `SB-Mid-xxx`
- Production credentials: `Mid-xxx` (tanpa SB)

## ❓ FAQ

### Q: Saya sudah dtoggle masih di mode Production. Pastikan:
1. Lihat pojok kanan atas dashboard
2. Cari toggle yang menunjukkan "Production" atau "Sandbox"
3. **KLIK dan switch ke "Sandbox"**
4. Refresh halaman Access Keys
5. Credentials sekarang harus dimulai dengan SB-.midtrans.com/
4. Jika diminta, pilih "Sandbox Environment"

### Q: Apakah perlu verifikasi bisnis untuk Sandbox?
**A:** TIDAK! Sandbox tidak perlu verifikasi. Bisa langsung pakai setelah daftar.
midtrans.com > Switch ke Sandbox mode
### Q: Credentials Sandbox saya hilang/lupa?
**A:** Login ke dashboard.sandbox.midtrans.com > Settings > Access Keys. Credentials selalu bisa dilihat di sana.

### Q: Bisa pakai credentials Production untuk testing?
**A:** JANGAN! Production untuk transaksi real. Gunakan Sandbox untuk testing.

## 📸 Screenshot Panduan (Deskripsi)

**Dashboard Sandbox yang BENAR akan tampil seperti ini:**

```DASHBOARD    [Production ▼ Sandbox ✓]   ║
║                        👆 TOGGLE INI HARUS SANDBOX ║
╠════════════════════════════════════════════════════╣
║ ⚠️ SANDBOX MODE - FOR TESTING ONLY               ══╗
║ MIDTRANS SANDBOX DASHBOARD                        ║
║                                    [SANDBOX MODE] ║
╠════════════════════════════════════════════════════╣
║ > Home                                             ║
║ > Transactions                                     ║
║ > ⚙️ Settings                                      ║
║   └─ Access Keys  ← KLIK INI                      ║
╠════════════════════════════════════════════════════╣
║                                                    ║
║ Access Keys                                        ║
║ Environment: SANDBOX                               ║
║                                                    ║
║ Merchant ID:  G123456789                          ║
║ Client Key:   SB-Mid-client-xxxxxxxxxxxx          ║
║               👆 Harus ada SB-                    ║
║ Server Key:   SB-Mid-server-xxxxxxxxxxxx          ║
║               👆 Harus ada SB-                    ║
║                                                    ║
╚════════════════════════════════════════════════════╝
```

## 🆘 Masih Error?

Jika setelah mengikuti panduan ini masih error:

1. **Screenshot** halaman Access Keys Anda
2. **Pastikan** ada tulisan "SB-" di credentials
3. **Copy** credentials dengan teliti (jangan ada spasi extra)
4. **Clear cache** Laravel: `php artisan config:clear`
5. *Dashboard Midtrans**: https://dashboard.midtrans.com/ (satu-satunya dashboard)
- **Registration**: https://dashboard.midtrans.com/register
- **Docs**: https://docs.midtrans.com/
- **INGAT**: Setelah login, **SWITCH ke Sandbox mode** menggunakan toggle di pojok kanan atas!

- **Sandbox Dashboard**: https://dashboard.sandbox.midtrans.com/
- **Sandbox Registration**: https://dashboard.sandbox.midtrans.com/register
- **Docs**: https://docs.midtrans.com/

---

**Setelah menggunakan credentials Sandbox yang BENAR (dengan prefix SB-), popup Midtrans akan muncul!** 🎉
