<?php

namespace App\Http\Controllers;

use App\Models\Tata_tertib;
use Illuminate\Http\Request;

class RulesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Tata_tertib::all();
        return view('hrd.rules', compact('data'));
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
            'rules_pengerjaan' => ['required', 'min:3', 'max:255', 'unique:rules'],
        ]);

        Tata_tertib::create($validatedData);
        return redirect('/rules')->with('success', 'Data telah berhasil ditambahkan');
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
    public function update(Request $request, Tata_tertib $id)
    {
        $rules = [];

        if ($request->rules_pengerjaan != $id->rules_pengerjaan) {
            $rules['rules_pengerjaan'] = 'required|min:3|max:255|unique:rules';
        }

        $validatedData = $request->validate($rules);
        Tata_tertib::where('id', $id->id)
            ->update($validatedData);

        return redirect('/rules')->with('update', 'Data telah berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tata_tertib $id)
    {
        Tata_tertib::destroy($id->id);
        return redirect('/rules')->with('delete', 'Data telah berhasil dihapus');
    }
}
