<?php

namespace App\Http\Controllers;

use App\Models\Alur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $data = Alur::orderBy('urutan')->get();
        $data2 = DB::table('users')->where('role_id', '=', 1)->count();
        $data3 = DB::table('users')->where('role_id', '=', 2)->count();
        $sudah_mengerjakan = DB::table('hasil_test')->count();
        $user_aktif = DB::table('users')->where('role_id', '=', 1)->where('status', '=', 1)->count();
        if (Auth::user()) {
            if (Auth::user()->role_id == 1 && Auth::user()->status == 1) {
                $users = DB::table('users');
                return view('user/dashboard_user', ['users' => $users], compact('data'));
            } elseif (Auth::user()->role_id == 2 && Auth::user()->status == 1) {
                $users = DB::table('users');
                return view('hrd/dashboard_hrd', ['users' => $users], compact('data2', 'sudah_mengerjakan', 'user_aktif'));
            } elseif (Auth::user()->role_id == 3 && Auth::user()->status == 1) {
                $users = DB::table('users');
                return view('admin/dashboard_admin', ['users' => $users], compact('data2', 'data3'));
            }
            return back()->with('loginVerifikasi', 'User Belum Aktif');
        }
    }


    public function dashboard_hrd()
    {
        $data2 = DB::table('users')->where('role_id', '=', 1)->count();
        $sudah_mengerjakan = DB::table('hasil_test')->count();
        $user_aktif = DB::table('users')->where('role_id', '=', 1)->where('status', '=', 1)->count();
        return view('hrd.dashboard_hrd', compact('data2', 'sudah_mengerjakan', 'user_aktif'));
    }
}
