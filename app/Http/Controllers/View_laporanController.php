<?php

namespace App\Http\Controllers;

use App\Models\Hasil_tes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class View_laporanController extends Controller
{

    public function index()
    {
        $data = Hasil_tes::with('user')->orderByDesc('id')->paginate(5);
        return view('hrd.view_laporan', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function print()
    {
        $data = Hasil_tes::with('user')->orderByDesc('id')->get();
        return view('hrd.print', compact('data'));
    }
}
