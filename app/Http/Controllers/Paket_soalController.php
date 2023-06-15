<?php

namespace App\Http\Controllers;

use App\Models\Poin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Paket_soalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('paket_soal')
            ->where('soal', 'like', '%' . request('search') . '%')
            ->orwhere('jawaban_A', 'like', '%' . request('search') . '%')
            ->orwhere('jawaban_B', 'like', '%' . request('search') . '%')
            ->orwhere('jawaban_C', 'like', '%' . request('search') . '%')
            ->orwhere('jawaban_D', 'like', '%' . request('search') . '%')
            ->orwhere('jawaban_E', 'like', '%' . request('search') . '%')
            ->join('kategori_tes', 'paket_soal.kategori_id', '=', 'kategori_tes.id_kategori')->paginate(5);
        return view('admin.paket_soal', compact('data'));
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
            'soal' => ['required', 'min:3', 'max:255', 'unique:paket_soal'],
            'kategori_id' => ['required'],
            'jawaban_A' => ['required'],
            'jawaban_B' => ['required'],
            'jawaban_C' => ['required'],
            'jawaban_D' => ['required'],
            'jawaban_E' => ['required'],
            'poin_A' => ['required'],
            'poin_B' => ['required'],
            'poin_C' => ['required'],
            'poin_D' => ['required'],
            'poin_E' => ['required'],
        ]);

        Poin::create($validatedData);
        return redirect('/paket_soal')->with('success', 'Data telah berhasil ditambahkan');
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
    public function update(Request $request, Poin $id)
    {
        $rules = [
            'kategori_id' => ['required'],
            'jawaban_A' => ['required'],
            'jawaban_B' => ['required'],
            'jawaban_C' => ['required'],
            'jawaban_D' => ['required'],
            'jawaban_E' => ['required'],
            'poin_A' => ['required'],
            'poin_B' => ['required'],
            'poin_C' => ['required'],
            'poin_D' => ['required'],
            'poin_E' => ['required'],
        ];

        if ($request->soal != $id->soal) {
            $rules['soal'] = 'required|min:3|max:255|unique:paket_soal';
        }

        $validatedData = $request->validate($rules);
        Poin::where('id', $id->id)
            ->update($validatedData);

        return redirect('/paket_soal')->with('update', 'Data telah berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Poin $id)
    {
        Poin::destroy($id->id);
        return redirect('/paket_soal')->with('delete', 'Data telah berhasil dihapus');
    }
}
