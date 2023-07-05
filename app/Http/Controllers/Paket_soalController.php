<?php

namespace App\Http\Controllers;

use App\Models\Informasi_kat;
use App\Models\Kategori;
use App\Models\Poin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class Paket_soalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $kategori = DB::table('kategori_tes')->get();


        $data = Poin::with('kategori')
            ->where('soal', 'like', '%' . request('search') . '%')
            ->orwhere('jawaban_A', 'like', '%' . request('search') . '%')
            ->orwhere('jawaban_B', 'like', '%' . request('search') . '%')
            ->orwhere('jawaban_C', 'like', '%' . request('search') . '%')
            ->orwhere('jawaban_D', 'like', '%' . request('search') . '%')
            ->orwhere('jawaban_E', 'like', '%' . request('search') . '%')
            ->orwhere('kategori_id', 'like', '%' . request('search') . '%')
            ->paginate(5);


        return view('admin.soal', compact('data', 'kategori',));
    }


    public function index_kategori()
    {
        $kategori = DB::table('kategori_tes')
            ->where('kategori', 'like', '%' . request('search') . '%')
            ->paginate(5);
        return view('admin.kategori', compact('kategori'));
    }

    public function index_informasi()
    {
        $kategori = DB::table('kategori_tes')->get();
        $data = Informasi_kat::with('informasi_kategori')->paginate(5);
        return view('admin.informasi_kat', compact('data', 'kategori'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function store_kategori(Request $request)
    {
        $validatedData = $request->validate([
            'kategori' => ['required', 'min:1', 'max:255', 'unique:kategori_tes'],
            'ambang_batas' => ['required', 'min:1'],
        ]);
        Kategori::create($validatedData);
        return redirect('/kategori')->with('success', 'Data telah berhasil ditambahkan');
    }



    public function store_informasi(Request $request)
    {
        $validatedData = $request->validate([
            'informasi' => ['required', 'min:1', 'max:255', 'unique:informasi_kategori'],
            'kategori_id' => ['required'],
        ]);
        Informasi_kat::create($validatedData);
        return redirect('/informasi')->with('success', 'Data telah berhasil ditambahkan');
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
        return redirect('/soal')->with('success', 'Data telah berhasil ditambahkan');
    }


    public function update_kategori(Request $request, Kategori $id)
    {
        $rules = [
            'ambang_batas' => ['required', 'min:1'],
        ];

        if ($request->kategori != $id->kategori) {
            $rules['kategori'] = 'required|min:1|max:255|unique:kategori_tes';
        }

        $validatedData = $request->validate($rules);
        Kategori::where('id', $id->id)
            ->update($validatedData);

        return redirect('/kategori')->with('update', 'Data telah berhasil diupdate');
    }


    public function update_informasi(Request $request, Kategori $id)
    {
        $rules = [
            'kategori_id' => ['required'],
        ];

        if ($request->informasi != $id->informasi) {
            $rules['informasi'] = 'required|min:1|max:255|unique:informasi_kategori';
        }

        $validatedData = $request->validate($rules);
        Informasi_kat::where('id', $id->id)
            ->update($validatedData);

        return redirect('/informasi')->with('update', 'Data telah berhasil diupdate');
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

        return redirect('/soal')->with('update', 'Data telah berhasil diupdate');
    }

    public function destroy(Poin $id)
    {
        Poin::destroy($id->id);
        return redirect('/soal')->with('delete', 'Data telah berhasil dihapus');
    }

    public function destroy_kategori(Kategori $id)
    {
        Kategori::destroy($id->id);
        return redirect('/kategori')->with('delete', 'Data telah berhasil dihapus');
    }


    public function destroy_informasi(Informasi_kat $id)
    {
        Informasi_kat::destroy($id->id);
        return redirect('/informasi')->with('delete', 'Data telah berhasil dihapus');
    }
}
