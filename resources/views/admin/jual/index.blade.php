@extends('admin.layoutadmin.mother')
@section('container')
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

    <!-- Tombol Tambah Pendaftaran Beasiswa -->

    <!-- Tabel Pendaftaran Beasiswa -->
    <div class="table-responsive">
        <table class="table table-bordered" id="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Foto</th>
                    <th>Jenis sampah</th>
                    <th>Berat sampah</th>
                    <th>Total harga</th>
                    <th>status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->user->email }}</td>
                        <td>   <img src="{{ asset('storage/' . $item->foto) }}" alt="Image" style="width: 200px; height:200px"></td>
                        <td>{{ $item->jenissampah->nama }}</td>
                        <td>{{ $item->berat_sampah }}</td>
                        <td>{{ $item->total_harga }}</td>
                        <td>
                            @if ($item->status === 0)
                                Belum Dikonfirmasi
                            @elseif ($item->status === 1)
                                Terkonfirmasi
                            @endif
                        </td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Update
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('admin.verif', ['itemId' => $item->id, 'status' => 1]) }}">Konfirmasi</a>
                                    <a class="dropdown-item" href="{{ route('admin.verif', ['itemId' => $item->id, 'status' => 0]) }}">Tidak terkonfirmasi</a>
                                </div>
                            </div>
                            <form action="{{ route('admin.delete', $item->id) }}" method="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus item ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <script>
            $(document).ready(function () {
                // Initialize Bootstrap components
                $('[data-toggle="dropdown"]').dropdown();
            });
        </script>
    </div>
@endsection
