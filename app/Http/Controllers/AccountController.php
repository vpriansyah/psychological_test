<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::all();
        return view('admin.account', compact('data'));
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
            'username' => ['required', 'min:3', 'max:255'],
            'email' => 'required|min:1|max:255|email:dns|unique:users',
            'password' => 'required|min:5|max:255',
            'role_id' => 'required',
            'status' => 'required',
        ]);

        User::create($validatedData);
        return redirect('/account')->with('success', 'Data telah berhasil ditambahkan');
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
    public function update(Request $request, User $id)
    {
        $rules = [
            'username' => ['required', 'min:3', 'max:255'],
            'password' => 'required|min:5|max:255',
            'role_id' => 'required',
            'status' => 'required',
        ];

        if ($request->email != $id->email) {
            $rules['email'] = 'required|min:1|max:255|email:dns|unique:users';
        }

        $validatedData = $request->validate($rules);
        User::where('id', $id->id)
            ->update($validatedData);

        return redirect('/account')->with('update', 'Data telah berhasil diupdate');
    }

    public function changeUserStatus(Request $request)
    {
        $users = User::find($request->id);
        $users->status = $request->status;
        $users->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $id)
    {
        User::destroy($id->id);
        return redirect('/account')->with('delete', 'Data telah berhasil dihapus');
    }
}
