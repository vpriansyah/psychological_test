<?php

namespace App\Http\Controllers;

use App\Models\Alur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AlurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data = Alur::all();
        $data2 = DB::table('users')->where('role_id', '=', 1)->count();
        $sudah_mengerjakan = DB::table('hasil_test')->count();
        $user_aktif = DB::table('users')->where('role_id', '=', 1)->where('status', '=', 1)->count();
        $data = Alur::orderBy('urutan')->get();
        $user_belum = $data2 - $sudah_mengerjakan;
        // $datatatatertib = Tata_tertib::all();
        return view('hrd.alur', compact('data', 'data2', 'sudah_mengerjakan', 'user_aktif', 'user_belum'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'alur_pengerjaan' => ['required', 'min:3', 'max:255', 'unique:alur'],
            'urutan' => ['required', 'unique:alur'],
        ]);
        Alur::create($validatedData);
        return redirect('/alur')->with('success', 'Data telah berhasil ditambahkan');
    }

    public function update(Request $request, Alur $id)
    {
        $rules = [];

        if ($request->alur_pengerjaan != $id->alur_pengerjaan) {
            $rules['alur_pengerjaan'] = 'required|min:3|max:255|unique:alur';
        } else if ($request->urutan != $id->urutan) {
            $rules['urutan'] = 'required|unique:alur';
        }

        $validatedData = $request->validate($rules);
        Alur::where('id', $id->id)
            ->update($validatedData);

        return redirect('/alur')->with('update', 'Data telah berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alur $id)
    {
        Alur::destroy($id->id);
        return redirect('/alur')->with('delete', 'Data telah berhasil dihapus');
    }
}
