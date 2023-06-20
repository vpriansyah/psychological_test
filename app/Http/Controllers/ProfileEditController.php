<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileEditController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::all();
        return view('user.profileEdit', compact('data'));
    }

    public function update(Request $request, User $id)
    {
        $rules = [
            'username' => ['required', 'min:3', 'max:255'],
            'nama_lengkap' => 'required',
            'gender' => 'required',
            'alamat' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'posisi_pilihan' => 'required',
            'images' => 'file|image|mimes:jpg,jpeg,png|max:50000'
        ];

        if ($request->email != $id->email) {
            $rules['email'] = 'required|min:1|max:255|email:dns|unique:users';
        }
        $validatedData = $request->validate($rules);

        $user = User::where('id', $id->id)->first();
        // dd($user);
        $oldImages = $user->images;

        if ($request->images != null) {
            if ($oldImages != null) {
                if (file_exists($oldImages)) {
                    unlink(public_path($oldImages));
                }
            }
            $foto = $request->file('images');
            $name = $foto->hashName();
            $validatedData['images'] = 'foto/' . $name;
            $foto->move(public_path('/foto'), $name);
        }



        $user->update($validatedData);

        return redirect('/profile')->with('update', 'Data profile telah berhasil diperbarui');
    }
}
