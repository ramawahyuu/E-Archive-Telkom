<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proposal2;

class HimpunanController extends Controller
{
    public function himpunan()
    {
        // Your logic here
        return view('himpunan'); // or any other appropriate response
    }
    public function index()
    {
        $proposal1 = Proposal2::find(1);
        $proposal2 = Proposal2::find(2);
        return view('himpunan_tasks', compact('proposal1', 'proposal2'));
    }

    /**
     * Menampilkan halaman admin dengan informasi bahan baku.
     */

    public function admin()
    {


        return view('himpunan');
    }
}
