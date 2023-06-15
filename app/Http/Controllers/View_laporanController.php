<?php

namespace App\Http\Controllers;

use App\Models\Hasil_tes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class View_laporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Hasil_tes::with('user')->paginate(5);
        return view('hrd.view_laporan', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function print()
    {
        $data = Hasil_tes::with('user')->get();
        return view('hrd.print', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
