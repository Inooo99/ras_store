<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran - RAS STORE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <script type="text/javascript"
      src="https://app.sandbox.midtrans.com/snap/snap.js"
      data-client-key="{{ config('midtrans.client_key') }}"></script>
</head>
<body style="background-color: #ffae00;">

    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card shadow-lg p-4 text-center" style="width: 400px; border-radius: 15px;">
            <h3 class="fw-bold mb-4">Konfirmasi Pembayaran</h3>
            
            <div class="alert alert-info">
                @if(isset($item->name))
                    Produk: <strong>{{ $item->name }}</strong>
                @elseif(isset($item->nama_layanan))
                    Layanan: <strong>{{ $item->nama_layanan }}</strong>
                @elseif(isset($item->nama_game))
                    Game: <strong>{{ $item->nama_game }}</strong>
                @endif
            </div>

            <h2 class="fw-bold text-success mb-4">
                Rp {{ number_format($item->price ?? $item->harga, 0, ',', '.') }}
            </h2>

            <button id="pay-button" class="btn btn-dark w-100 py-3 fw-bold rounded-pill">
                BAYAR SEKARANG 💳
            </button>

            <a href="{{ url('/') }}" class="btn btn-link mt-3 text-muted">Batal</a>
        </div>
    </div>

    <script type="text/javascript">
      var payButton = document.getElementById('pay-button');
      payButton.addEventListener('click', function () {
        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
        window.snap.pay('{{ $snapToken }}', {
          onSuccess: function(result){
            /* You may add your own implementation here */
            alert("Pembayaran Berhasil!");
            console.log(result);
            window.location.href = "/"; // Redirect ke home setelah sukses
          },
          onPending: function(result){
            /* You may add your own implementation here */
            alert("Menunggu Pembayaran!");
            console.log(result);
          },
          onError: function(result){
            /* You may add your own implementation here */
            alert("Pembayaran Gagal!");
            console.log(result);
          },
          onClose: function(){
            /* You may add your own implementation here */
            alert('Anda menutup popup tanpa menyelesaikan pembayaran');
          }
        })
      });
    </script>
</body>
</html>