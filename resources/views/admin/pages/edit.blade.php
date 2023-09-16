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

    <!-- Edit Form -->
    <main>
        <form action="{{ route('admin.update', $data->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Use the PUT method for updating -->

            <div class="mb-3">
              <label for="nama" class="form-label">Nama Jenis Sampah</label>
              <input type="text" class="form-control" id="nama" name="nama" value="{{ $data->nama }}">
            </div>
            <div class="mb-3">
              <label for="deskripsi" class="form-label">Deskripsi</label>
              <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{ $data->deskripsi }}">
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" class="form-control foto" id="foto" name="foto">
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="text" name="harga" id="harga" value="{{ $data->harga }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
          </form>
    </main>

    <script>
        // Function to format a number with commas
        function formatNumber(input) {
            return input.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        }
    
        // Function to remove commas and convert back to a number
        function parseNumber(input) {
            return input.replace(/\./g, '');
        }
    
        // Get the input element
        var hargaInput = document.getElementById('harga');
    
        // Add an event listener to format the number as the user types
        hargaInput.addEventListener('input', function() {
            var value = this.value;
            var parsedValue = parseNumber(value);
            var formattedValue = formatNumber(parsedValue);
            this.value = formattedValue;
        });
    </script>
@endsection
