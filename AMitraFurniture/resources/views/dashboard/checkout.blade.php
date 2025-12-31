<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MIDTRANS -->
    <script src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('services.midtrans.client_key') }}">
    </script>
</head>

<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5>Checkout</h5>
        </div>

        <div class="card-body">

            <p><b>Produk:</b> {{ $product->name }}</p>
            <p><b>Harga:</b> Rp {{ number_format($product->price,0,',','.') }}</p>

            <!-- METODE -->
            <div class="mb-3">
                <button class="btn btn-outline-primary" onclick="selectPayment('midtrans')">
                    Midtrans
                </button>

                <button class="btn btn-outline-secondary" onclick="selectPayment('bank')">
                    Transfer Bank
                </button>

                <button class="btn btn-outline-success" onclick="selectPayment('ewallet')">
                    E-Wallet
                </button>
            </div>

            <!-- BANK -->
            <div id="bankBox" class="d-none">
                <button class="btn btn-sm btn-outline-dark" onclick="showBank('BCA')">BCA</button>
                <button class="btn btn-sm btn-outline-dark" onclick="showBank('BRI')">BRI</button>
            </div>

            <!-- EWALLET -->
            <div id="ewalletBox" class="d-none">
                <button class="btn btn-sm btn-outline-dark" onclick="showEwallet('OVO')">OVO</button>
                <button class="btn btn-sm btn-outline-dark" onclick="showEwallet('GOPAY')">GOPAY</button>
            </div>

            <!-- INFO -->
            <div id="infoBox" class="alert alert-info d-none mt-3"></div>

            <button id="payBtn" class="btn btn-success w-100 mt-3">
                Bayar Sekarang
            </button>
        </div>
    </div>
</div>

<script>
let paymentMethod = '';

function selectPayment(type) {
    paymentMethod = type;

    document.getElementById('bankBox').classList.add('d-none');
    document.getElementById('ewalletBox').classList.add('d-none');
    document.getElementById('infoBox').classList.add('d-none');

    if (type === 'bank') document.getElementById('bankBox').classList.remove('d-none');
    if (type === 'ewallet') document.getElementById('ewalletBox').classList.remove('d-none');
}

function showBank(bank) {
    showInfo(`
        <b>Transfer ${bank}</b><br>
        Rek: <b>1234567890</b><br>
        A/N: PT A Mitra Furniture
    `);
}

function showEwallet(wallet) {
    showInfo(`
        <b>${wallet}</b><br>
        No: <b>081234567890</b>
    `);
}

function showInfo(html) {
    const box = document.getElementById('infoBox');
    box.innerHTML = html;
    box.classList.remove('d-none');
}

document.getElementById('payBtn').addEventListener('click', function () {

    if (!paymentMethod) {
        alert('Pilih metode pembayaran!');
        return;
    }

    // NON MIDTRANS
    if (paymentMethod !== 'midtrans') {
        alert('Silakan transfer sesuai informasi.');
        window.location.href = "{{ route('orders.index') }}";
        return;
    }

    // MIDTRANS
    fetch("{{ route('checkout.pay', $product->id) }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name=csrf-token]').content
        },
        body: JSON.stringify({
            product_id: {{ $product->id }},
            payment_method: 'midtrans'
        })
    })
    .then(res => res.json())
    .then(data => {
        if (!data.snap_token) {
            alert('Gagal membuat transaksi');
            return;
        }

        snap.pay(data.snap_token, {
            onSuccess: function () {
                window.location.href = "/payment/success/" + data.order_id;
            },
            onPending: function () {
                window.location.href = "/payment/success/" + data.order_id;
            },
            onError: function () {
                alert("Pembayaran gagal");
            }
        });
    });
});
</script>

</body>
</html>
