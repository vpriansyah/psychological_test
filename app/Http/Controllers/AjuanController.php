<?php

namespace App\Http\Controllers;

use App\Models\Ajuan;
use Illuminate\Http\Request;

class AjuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('ajuan');
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => ['required', 'min:3', 'max:255'],
            'email' => 'required|min:1|max:255|email:dns|unique:ajuan',
            'keperluan' => 'required|min:5|max:255',
            'status' => 'required',
        ]);

        Ajuan::create($validatedData);
        return back()->with('success', 'Akun telah berhasil diajukan');
    }
}
