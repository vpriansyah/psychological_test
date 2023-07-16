<?php

namespace App\Http\Controllers;

use App\Models\Posisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PosisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data2 = DB::table('users')->where('role_id', '=', 1)->count();
        $sudah_mengerjakan = DB::table('hasil_test')->count();
        $user_aktif = DB::table('users')->where('role_id', '=', 1)->where('status', '=', 1)->count();
        $data = DB::table('posisi')->get();
        return view('hrd.posisi', compact('data', 'data2', 'sudah_mengerjakan', 'user_aktif'));
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
        $validatedData = $request->validate([
            'posisi' => ['required', 'min:3', 'max:255', 'unique:posisi'],
        ]);

        Posisi::create($validatedData);
        return redirect('/posisi')->with('success', 'Data telah berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Posisi $posisi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Posisi $posisi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Posisi $posisi)
    {
        //
    }

    public function changePosisiStatus(Request $request)
    {
        $users = Posisi::find($request->id);
        $users->status = $request->status;
        $users->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Posisi $id)
    {
        Posisi::destroy($id->id);
        return redirect('/posisi')->with('delete', 'Data telah berhasil dihapus');
    }
}
