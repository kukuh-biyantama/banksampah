<!-- resources/views/child.blade.php --> 
@extends('user.layout.master') 
@section('title', 'kalkulator') 
@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Jual Sampah</h1>
<div class="container mt-5">
    <form action="{{ url('/kalkulator/hitung') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="user_id" id="user_id" value="{{ $data }}">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="jenis_sampah">Pilih Jenis Sampah:</label>
                <select class="form-select" name="jenis_sampah" id="jenis_sampah">
                    @foreach ($jenisSampahData as $jenis)
                        <option value="{{ $jenis->id }}">{{ $jenis->nama }} - Rp {{ number_format($jenis->harga, 0, ',', '.') }}/kg</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" name="nama" id="nama">
            </div>
            <div class="col-md-6 mb-3">
                <label for="berat_sampah">Berat Sampah (kg):</label>
                <input type="number" class="form-control" name="berat_sampah" id="berat_sampah" step="0.01" min="0">
            </div>
            <div class="col-md-6 mb-3">
                <label for="gambar">Gambar:</label>
                <input type="file" class="form-control" name="gambar" id="gambar">
            </div>
        </div>
        <div class="text-center mt-3">
            <button type="submit" class="btn btn-primary">Jual</button>
        </div>
    </form>

    <h2 class="mt-5">Jenis Sampah</h2>
    <div class="row">
        @foreach ($jenisSampahData as $jenis)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ asset('storage/' . $jenis->foto) }}" class="card-img-top" alt="{{ $jenis->nama }}" style="width: 400px; height:250px">
                <div class="card-body">
                    <h5 class="card-title">{{ $jenis->nama }}</h5>
                    <p class="card-text">{{ $jenis->deskripsi }}</p>
                    <p class="card-text">Harga: Rp {{ number_format($jenis->harga, 0, ',', '.') }}/kg</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection