@extends('user.layout.master')
@section('title', 'status jual')
@section('content')
<div class="container mt-5">
    <h1>Status Jual</h1>
    
    @foreach($statusJual as $item)
        <div class="card mb-3">
            <div class="card-header">
                Jual ID: {{ $item->id }}
            </div>
            <div class="card-body">
                <h5 class="card-title">Nama: {{ $item->nama }}</h5>
                <p class="card-text">ID User: {{ $item->user->id }}</p>
                <p class="card-text">Berat Sampah (kg): {{ $item->berat_sampah }}</p>
                <p class="card-text">Total Harga: Rp {{ number_format($item->total_harga, 0, ',', '.') }}</p>
                <p class="card-text">Status: {{ $item->status == 0 ? 'belum disetujui' : 'sudah disetujui' }}</p>
            </div>
        </div>
    @endforeach
</div>
@endsection
