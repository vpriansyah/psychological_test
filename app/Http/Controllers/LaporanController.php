<?php

namespace App\Http\Controllers;

use App\Models\Hasil_tes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Hasil_tes::with('user')->orderByDesc('id')
            ->paginate(5);
        return view('admin.laporan', compact('data'));
    }

    public function update(Request $request, Hasil_tes $id)
    {
        $rules = [];

        if ($request->keterangan != $id->keterangan) {
            $rules['keterangan'] = 'min:1';
        }

        $validatedData = $request->validate($rules);
        Hasil_tes::where('id', $id->id)
            ->update($validatedData);

        return redirect('/laporan')->with('update', 'Data telah berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hasil_tes $id)
    {
        Hasil_tes::destroy($id->id_hasil);
        return redirect('/laporan')->with('delete', 'Data telah berhasil dihapus');
    }
}
