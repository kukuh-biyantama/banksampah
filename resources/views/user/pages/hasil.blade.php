<!-- resources/views/child.blade.php -->
@extends('user.layout.master')
@section('title', 'Kalkulator')
@section('content')
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif
<div class="container mt-5">
    <h1 class="mb-4">Hasil Perhitungan Harga Sampah</h1>
    <div class="card">
        <div class="card-body">
            <p><strong>Jenis Sampah:</strong> {{ $jenisSampah->nama }}</p>
            <p><strong>Harga per Kilogram:</strong> Rp {{ number_format($hargaPerKg, 0, ',', '.') }}/kg</p>
            <p><strong>Berat Sampah:</strong> {{ $beratSampah }} kg</p>
            <p><strong>Total Harga:</strong> Rp {{ number_format($totalHarga, 0, ',', '.') }}</p>
        </div>
    </div>
</div>
@endsection
