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
    <main>
        <form action="{{ route('admin.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Nama Jenis Sampah</label>
              <input type="text" class="form-control" id="nama" name="nama">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Deskripsi</label>
              <input type="text" class="form-control" id="deskripsi" name="deskripsi">
            </div>
            <div class="mb-3">
                <label class="form-label">Foto</label>
                <input type="file" class="form-control foto" id="foto" name="foto">
            </div>
            <div class="mb-3">
                <label class="form-label">Harga</label>
                <input type="text" name="harga" id="harga">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </main>
    <script>
        // Function to format a number with commas
        // Function to remove commas and convert back to a number
        function parseNumber(input) {
            return input.replace(/,/g, ''); // Remove all commas globally
        }

        // ...

        hargaInput.addEventListener('input', function() {
            var value = this.value;
            var parsedValue = parseNumber(value);
            // Ensure that the parsed value is not empty before formatting
            if (parsedValue) {
                var formattedValue = formatNumber(parsedValue);
                this.value = formattedValue;
            }
        });
    </script>
@endsection
