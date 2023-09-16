<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        h1 {
            color: #007bff;
            font-size: 36px;
            margin-top: 40px;
        }

        p {
            font-size: 18px;
            color: #333;
            margin-bottom: 20px;
        }

        .container {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 400px;
            margin: 0 auto;
        }

        /* Customize button style */
        button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Hasil Perhitungan Harga Sampah</h1>
        <p>Jenis Sampah: {{ $jenisSampah->nama }}</p>
        <p>Harga per Kilogram: Rp {{ number_format($hargaPerKg, 0, ',', '.') }}/kg</p>
        <p>Berat Sampah: {{ $beratSampah }} kg</p>
        <p>Total Harga: Rp {{ number_format($totalHarga, 0, ',', '.') }}</p>
    </div>
</body>
</html>
