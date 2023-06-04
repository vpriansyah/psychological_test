<?php

namespace App\Http\Controllers;

use App\Models\Alur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AlurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data = Alur::all();
        $data = Alur::orderBy('urutan')->get();
        // $datatatatertib = Tata_tertib::all();
        return view('hrd.alur', compact('data'));
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
            'alur_pengerjaan' => ['required', 'min:3', 'max:255', 'unique:alur'],
            'urutan' => ['required', 'unique:alur'],
        ]);
        Alur::create($validatedData);
        return redirect('/alur')->with('success', 'Data telah berhasil ditambahkan');
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
