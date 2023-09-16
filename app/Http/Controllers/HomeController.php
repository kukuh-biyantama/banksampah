<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\jenissampah;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\jual;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function viewstatus()
    {
        $userId = Auth::id();

        $statusJual = JenisSampah::where('id', $userId)->get();
        return view('user.pages.statusjual', compact('statusJual'));
    }


    public function grafiksampah()
    {
        // Fetch the data using a query
        $data = DB::table('juals')
            ->select('jenis_sampah_id', DB::raw('count(*) as total'))
            ->groupBy('jenis_sampah_id')
            ->get();

        // Transform the data into a format suitable for Google Charts
        $chartData = [['Jenis Sampah', 'Jumlah Terjual']];
        foreach ($data as $item) {
            $jenisSampahName = $item->jenis_sampah_id; // Replace this with the actual column name for jenis_sampah name
            $jumlahTerjual = (int)$item->total;
            $chartData[] = [$jenisSampahName, $jumlahTerjual];
        }

        // Convert the data to JSON format
        $chartData = json_encode($chartData);

        return view('user.pages.grafik', compact('chartData'));
    }
    public function showPieChart()
    {
        // Query to get waste types and their counts (adjust this query as needed)
        $wasteData = DB::table('juals')
            ->select('jenissampahs.nama', DB::raw('count(*) as count'))
            ->join('jenissampahs', 'juals.jenis_sampah_id', '=', 'jenissampahs.id')
            ->groupBy('jenissampahs.nama') // Use 'jenissampah.nama' for grouping
            ->get();

        // Create an array to hold the chart data
        $chartData = [['Waste Type', 'Count']];

        // Populate the chart data array with the results
        foreach ($wasteData as $data) {
            $chartData[] = [$data->nama, $data->count];
        }

        // Pass the chart data to the view
        return view('user.pages.grafik', compact('chartData'));
    }
}
