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
        $data = Tata_tertib::all();
        return view('hrd.rules', compact('data'));
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
