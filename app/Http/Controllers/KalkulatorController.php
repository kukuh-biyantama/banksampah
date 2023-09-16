<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\jenissampah;
use App\Models\jual;

class KalkulatorController extends Controller
{
    //
    public function index()
    {
        $jenisSampahData = jenissampah::all();
        return view('welcome', compact('jenisSampahData'));
    }
    public function hitung(Request $request)
    {
        $request->validate([
            'jenis_sampah' => 'required|exists:jenissampahs,id',
            'berat_sampah' => 'required|numeric|min:0',
            'nama' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:5000', // Adjust file validation rules as needed
        ]);

        // Find the selected jenis sampah by ID
        $jenisSampah = JenisSampah::find($request->jenis_sampah);

        // Get the harga per kilogram for the selected jenis sampah
        $hargaPerKg = $jenisSampah->harga;

        // Get the berat_sampah from the request
        $beratSampah = $request->berat_sampah;

        // Calculate the total harga
        $totalHarga = $hargaPerKg * $beratSampah;

        // Handle file upload (assuming you are storing the image in a specific folder)
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('public/uploads');
            $gambar = str_replace('public/', '', $gambar);
        }

        // Save the data to the database
        jual::create([
            'jenis_sampah_id' => $request->jenis_sampah,
            'nama' => $request->nama,
            'berat_sampah' => $beratSampah,
            'total_harga' => $totalHarga,
            'gambar' => $gambar,
        ]);

        // Return the result to the view
        return view('hasil', compact('jenisSampah', 'hargaPerKg', 'beratSampah', 'totalHarga'));
    }
}
