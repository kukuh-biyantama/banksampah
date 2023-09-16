<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\jenissampah;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\jual;

class AdminController extends Controller
{
    //
    public function index()
    {
        return view('admin.layoutadmin.mother');
    }

    public function view()
    {
        $data = jenissampah::all();
        return view('admin.pages.index', compact('data'));
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:5000', // Example for image upload
            'harga' => 'required',
            // Add more validation rules for other fields
        ]);

        // Handle file upload (assuming you are storing the image in a specific folder)
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('public/uploads');
            $foto = str_replace('public/', '', $foto);
        }
        $harga = (int) str_replace(',', '', $request->input('harga'));

        // Create a new record in the database
        jenissampah::create([
            'nama' => $request->input('nama'),
            'deskripsi' => $request->input('deskripsi'),
            'foto' => $foto,
            'harga' => $harga
        ]);

        return redirect()->route('admin.view')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = jenissampah::find($id);
        return view('admin.pages.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:5000', // Optional: Allow updating the image
            'harga' => 'required',
            // Add more validation rules for other fields
        ]);
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('public/uploads');
            $foto = str_replace('public/', '', $foto);
        }
        // Find the existing record by ID
        $jenissampah = jenissampah::findOrFail($id);
        $harga = (int) str_replace(',', '', $request->input('harga'));
        // Update the record with the new data
        $jenissampah->update([
            'nama' => $request->input('nama'),
            'deskripsi' => $request->input('deskripsi'),
            'harga' => $harga,
            // Optionally, update the image if a new one is provided
            'foto' => $foto,
        ]);

        return redirect()->route('admin.view')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        jenissampah::findOrFail($id)->delete();
        return redirect()->route('admin.view')->with('success', 'Data berhasil di hapus.');
    }

    public function indexjual()
    {
        $data = jual::with('user', 'jenissampah')->get();
        return view('admin.jual.index', compact('data'));
    }

    public function updateStatus($itemId, $status)
    {
        $item = jual::findOrFail($itemId);

        // Update the verification status
        $item->status = $status;
        $item->save();

        return redirect()->back()->with('success', 'Item verification updated successfully.');
    }

    public function destroyjual($id)
    {
        jual::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Item delete successfully.');
    }
}
