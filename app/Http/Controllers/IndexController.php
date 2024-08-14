<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Proposal;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    /**
     * Menampilkan halaman index.
     */
    public function index()
    {

        return view('index');
    }
    /**
     * Menampilkan halaman admin untuk wadek.
     */
    public function wadek()
    {
        return view('admin.index');
    }

    /**
     * Menampilkan halaman admin untuk kemahasiswaan.
     */
    public function kemahasiswaan()
    {
        return view('admin.index');
    }

    /**
     * Menampilkan halaman admin.
     */
    public function admin()
    {
        $totalProposals = Proposal::count();
        $programs = Mahasiswa::select('program_studi', DB::raw('count(*) as total'))
            ->groupBy('program_studi')
            ->get();


        return view('admin.index', compact('totalProposals', 'programs'));
    }

    /**
     * Menampilkan halaman admin untuk mahasiswa.
     */
    public function mahasiswa()
    {
        return view('admin.index', compact('profile'));
    }
}
