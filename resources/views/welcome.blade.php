<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/styles1.css') }}">
    </head>
    <body class="antialiased">
        <div class="relative flex justify-center items-center min-h-screen bg-gray-100 dark:bg-gray-900">
            @if (Route::has('login'))
            <div class="fixed top-0 right-0 p-6 text-right z-10">
                @auth
                <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline-none focus:ring-2 focus:ring-red-500 focus:rounded-full px-3 py-1">Dashboard</a>
                @else
                <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline-none focus:ring-2 focus:ring-red-500 focus:rounded-full px-3 py-1">Log in</a>
        
                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline-none focus:ring-2 focus:ring-red-500 focus:rounded-full px-3 py-1">Register</a>
                @endif
                @endauth
            </div>
            @endif
        </div>
        <div class="container mt-5">
            <h1 class="mb-4">Kalkulator Harga Jenis Sampah</h1>
            <form action="{{ url('/kalkulator/hitung') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="jenis_sampah">Pilih Jenis Sampah:</label>
                    <select name="jenis_sampah" id="jenis_sampah">
                        @foreach ($jenisSampahData as $jenis)
                            <option value="{{ $jenis->id }}">{{ $jenis->nama }} - Rp {{ number_format($jenis->harga, 0, ',', '.') }}/kg</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="nama">Nama:</label>
                    <input type="text" name="nama" id="nama">
                </div>
                <div>
                    <label for="berat_sampah">Berat Sampah (kg):</label>
                    <input type="number" name="berat_sampah" id="berat_sampah" step="0.01" min="0">
                </div>
                <div>
                    <label for="gambar">Gambar:</label>
                    <input type="file" name="gambar" id="gambar">
                </div>
                <div>
                    <button type="submit">Hitung</button>
                </div>
            </form>
            
        </div>
    </body>
</html>
