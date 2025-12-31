<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran - A Mitra Furniture</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('CSS/style.css') }}">
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ $clientKey }}"></script>
</head>
<body>
    <div class="container py-5">
        <div class="text-center">
            <h3 class="mb-4">Proses Pembayaran</h3>
            <p class="text-muted mb-4">Klik tombol di bawah untuk melanjutkan pembayaran</p>
            
            <div class="card mb-4">
                <div class="card-body">
                    <h5>{{ $order->product->name }}</h5>
                    <p class="text-primary fw-bold fs-4">Rp {{ number_format($order->total_price, 0, ',', '.') }}</p>
                </div>
            </div>
            
            <button id="pay-button" class="btn btn-primary btn-lg">Bayar Sekarang</button>
        </div>
    </div>

    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function(){
            snap.pay('{{ $snapToken }}', {
                onSuccess: function(result){
                    window.location.href = '{{ route("payment.success", $order->id) }}';
                },
                onPending: function(result){
                    window.location.href = '{{ route("payment.success", $order->id) }}';
                },
                onError: function(result){
                    alert('Pembayaran gagal!');
                },
                onClose: function(){
                    alert('Anda menutup popup pembayaran');
                }
            });
        };
    </script>
</body>
</html>