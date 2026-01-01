# Integrasi Midtrans Payment Gateway

## Setup Konfigurasi

### 1. Environment Variables
Pastikan variabel berikut sudah ada di file `.env`:

```env
MIDTRANS_MERCHANT_ID=your_merchant_id_here
MIDTRANS_CLIENT_KEY=your_client_key_here
MIDTRANS_SERVER_KEY=your_server_key_here
MIDTRANS_IS_PRODUCTION=false
```

**Catatan**: Credentials di atas adalah untuk Sandbox (testing). Untuk production, ganti dengan credentials production dari dashboard Midtrans.

### 2. Package yang Digunakan
- `midtrans/midtrans-php` version ^2.6 (sudah terinstall)

### 3. Konfigurasi File
File konfigurasi: `config/midtrans.php`

## Flow Pembayaran

### A. Checkout dari Cart

1. **User mengakses halaman Cart** (`/cart`)
2. **Klik "Checkout"** → redirect ke `/checkout`
3. **Isi form checkout**:
   - Alamat pengiriman
   - Nomor telepon
4. **Submit form** → `OrderController@store`
   - Membuat order baru
   - Membuat order items
   - Generate Snap Token dari Midtrans
   - Hapus cart
   - Redirect ke halaman payment

5. **Halaman Payment** (`/payment/page/{order}`)
   - Menampilkan detail order
   - Tombol "Bayar Sekarang"
   - Klik tombol → muncul Snap Popup Midtrans

6. **Proses di Midtrans**:
   - User memilih metode pembayaran
   - User melakukan pembayaran
   - Midtrans mengirim callback ke server

7. **Callback Handler** (`/payment/callback`)
   - Verify signature
   - Update status order
   - Return response

8. **Payment Success** (`/payment/success/{order}`)
   - Menampilkan konfirmasi pembayaran berhasil

### B. Buy Direct (Beli Langsung dari Detail Produk)

1. **User di halaman detail produk**
2. **Klik "Beli Langsung"**
3. **Isi form** (quantity, alamat, nomor telepon)
4. **Submit** → `OrderController@pay`
   - Membuat order
   - Generate Snap Token
   - Return JSON dengan snap_token
5. **Frontend call `snap.pay()`** dengan token
6. **Rest sama seperti flow A**

## Endpoints API

### 1. Halaman Checkout
```
GET /checkout
Controller: OrderController@checkout
View: dashboard.checkout-cart
```

### 2. Proses Checkout
```
POST /orders
Controller: OrderController@store
Request Body:
  - alamat (required)
  - nomor_telepon (required)
Response: Redirect ke /payment/page/{order_id}
```

### 3. Payment Page
```
GET /payment/page/{order}
Controller: OrderController@paymentPage
View: dashboard.payment-page
```

### 4. Direct Buy Payment
```
POST /checkout/{id}/pay
Controller: OrderController@pay
Request Body:
  - quantity (required)
  - alamat (required)
  - nomor_telepon (required)
Response: JSON { snap_token, order_id }
```

### 5. Callback Midtrans (Webhook)
```
POST /payment/callback
Controller: OrderController@callback
Headers: Content-Type: application/json
Request Body: (from Midtrans)
  - order_id
  - transaction_status
  - signature_key
  - status_code
  - gross_amount
```

### 6. Payment Success Page
```
GET /payment/success/{order}
Controller: OrderController@paymentSuccess
View: dashboard.payment-success
```

### 7. Order History
```
GET /orders
Controller: OrderController@index
View: dashboard.order-history
```

### 8. Order Detail
```
GET /orders/{order}
Controller: OrderController@show
View: dashboard.order-detail
```

## Status Order

### Payment Status
- `pending` - Menunggu pembayaran
- `paid` - Pembayaran berhasil
- `failed` - Pembayaran gagal

### Order Status
- `pending` - Pesanan baru dibuat
- `processing` - Pesanan sedang diproses (setelah payment berhasil)
- `shipped` - Pesanan dikirim
- `delivered` - Pesanan sampai
- `cancelled` - Pesanan dibatalkan

## Testing di Sandbox

### Credit Card Test
```
Card Number: 4811 1111 1111 1114
CVV: 123
Exp: 01/25
OTP: 112233
```

### Bank Transfer
- Virtual Account akan dibuat otomatis
- Simulasi pembayaran di dashboard Midtrans

### E-Wallet
- Akan redirect ke halaman simulasi
- Approve pembayaran di halaman tersebut

## Webhook Configuration

Untuk menerima notifikasi pembayaran dari Midtrans, set webhook URL di dashboard Midtrans:

**Notification URL**:
```
https://yourdomain.com/payment/callback
```

**HTTP Method**: POST

**Catatan**: Untuk development local, gunakan ngrok atau expose untuk testing webhook.

## Troubleshooting

### Error: "Snap Token is empty"
- Pastikan credentials Midtrans sudah benar
- Cek apakah `config('midtrans.server_key')` mengembalikan value

### Error: "Invalid Signature"
- Server Key salah atau tidak sesuai dengan environment (sandbox/production)

### Callback tidak diterima
- Pastikan webhook URL sudah terdaftar di dashboard Midtrans
- Untuk local development, gunakan ngrok

### Snap Popup tidak muncul
- Pastikan script Snap sudah di-load: `https://app.sandbox.midtrans.com/snap/snap.js`
- Cek console browser untuk error JavaScript

## Security Notes

1. **JANGAN** expose Server Key di frontend
2. Snap Token hanya valid untuk 1 transaksi
3. Selalu verify signature di callback
4. Gunakan HTTPS di production
5. Set CORS jika diperlukan

## Production Checklist

- [ ] Ganti credentials ke production
- [ ] Set `MIDTRANS_IS_PRODUCTION=true`
- [ ] Update Snap script ke production: `https://app.midtrans.com/snap/snap.js`
- [ ] Daftarkan webhook production URL
- [ ] Test payment dengan kartu real
- [ ] Setup notification email untuk failed payment
- [ ] Enable logging untuk transaction

## File-File Penting

1. **Controller**: `app/Http/Controllers/OrderController.php`
2. **Models**:
   - `app/Models/Order.php`
   - `app/Models/OrderItem.php`
3. **Views**:
   - `resources/views/dashboard/checkout-cart.blade.php` (Checkout dari cart)
   - `resources/views/dashboard/checkout.blade.php` (Checkout single product)
   - `resources/views/dashboard/payment-page.blade.php` (Payment page dengan Snap)
   - `resources/views/dashboard/payment-success.blade.php` (Success page)
4. **Config**: `config/midtrans.php`
5. **Routes**: `routes/web.php`

## Support

Dokumentasi resmi Midtrans:
- https://docs.midtrans.com/
- https://snap-docs.midtrans.com/

Dashboard Midtrans:
- Sandbox: https://dashboard.sandbox.midtrans.com/
- Production: https://dashboard.midtrans.com/
