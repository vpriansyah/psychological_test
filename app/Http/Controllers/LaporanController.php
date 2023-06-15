<?php

namespace App\Http\Controllers;

use App\Models\Hasil_tes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Hasil_tes::with('user')
            ->paginate(5);
        return view('admin.laporan', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function update(Request $request, Hasil_tes $id)
    {
        $rules = [];

        if ($request->keterangan != $id->keterangan) {
            $rules['keterangan'] = 'min:1';
        }

        $validatedData = $request->validate($rules);
        Hasil_tes::where('id', $id->id)
            ->update($validatedData);

        return redirect('/laporan')->with('update', 'Data telah berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hasil_tes $id)
    {
        Hasil_tes::destroy($id->id_hasil);
        return redirect('/laporan')->with('delete', 'Data telah berhasil dihapus');
    }
}
