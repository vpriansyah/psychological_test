<?php

namespace App\Http\Controllers;

use App\Models\Contact_us;
use Illuminate\Http\Request;

class ContactusController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => ['required', 'min:3', 'max:255'],
            'email' => 'required|min:1|max:255|email:dns|unique:contactus',
            'subject' => 'required|min:5|max:255',
            'pesan' => 'required|min:5|max:255',
        ]);

        Contact_us::create($validatedData);
        return back();
    }
}
