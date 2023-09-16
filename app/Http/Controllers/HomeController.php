<?php

namespace App\Http\Controllers;

use App\Models\jenissampah;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $jenisSampahData = jenissampah::all();
        return view('welcome', compact('jenisSampahData'));
    }
}
