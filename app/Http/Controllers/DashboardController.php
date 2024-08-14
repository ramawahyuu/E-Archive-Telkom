<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterBahanBaku;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
      
            $bahan = MasterBahanBaku::all();
            $jumlah_masuk = MasterBahanBaku::where('qty_kedatangan', '>', 0)->count();
            $jumlah_keluar = MasterBahanBaku::where('qty_pengeluaran','>',0)->count();
            $jumlah_kadaluarsa = MasterBahanBaku::where('tgl_expired', '<', Carbon::now()->format('Y-m-d'))->count();

        return view('Dashboard', compact('jumlah_masuk', 'jumlah_keluar', 'jumlah_kadaluarsa',''));
    }
}
