<?php

namespace App\Http\Controllers;

use App\Models\Ajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('ajuan')
            ->where('nama', 'like', '%' . request('search') . '%')
            ->orwhere('email', 'like', '%' . request('search') . '%')
            ->orderByDesc('id')->paginate(5);
        return view('admin.notification', compact('data'));
    }


    public function changeAjuanStatus(Request $request)
    {
        $users = Ajuan::find($request->id);
        $users->status = $request->status;
        $users->save();
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ajuan $id)
    {
        Ajuan::destroy($id->id);
        return redirect('/notification')->with('delete', 'Data telah berhasil dihapus');
    }
}
