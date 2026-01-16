<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }} - Ras Store</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen">

    <div class="max-w-4xl mx-auto py-10 px-4">
        {{-- Tombol Kembali --}}
        <a href="{{ url('/') }}" class="text-yellow-600 hover:underline mb-4 inline-block">&larr; Kembali ke Home</a>

        <div class="bg-white rounded-2xl shadow-xl overflow-hidden flex flex-col md:flex-row">
            {{-- Gambar Produk --}}
            <div class="w-full md:w-1/2 h-64 md:h-auto bg-gray-200">
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
            </div>

            {{-- Info Produk --}}
            <div class="w-full md:w-1/2 p-8 flex flex-col justify-center">
                <h1 class="text-3xl font-bold text-gray-800 mb-2">{{ $product->name }}</h1>
                <p class="text-2xl text-yellow-600 font-bold mb-4">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                
                <p class="text-gray-600 mb-6 leading-relaxed">
                    {{ $product->description }}
                </p>

                <button class="w-full bg-yellow-600 text-white font-bold py-3 rounded-lg hover:bg-yellow-700 transition shadow-lg shadow-yellow-600/20">
                    Beli Sekarang
                </button>
            </div>
        </div>
    </div>

</body>
</html>