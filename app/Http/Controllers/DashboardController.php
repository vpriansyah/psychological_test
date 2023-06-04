<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()) {
            if (Auth::user()->role_id == 1 && Auth::user()->status == 1) {
                $users = DB::table('users');
                return view('user/dashboard_user', ['users' => $users]);
            } elseif (Auth::user()->role_id == 2 && Auth::user()->status == 1) {
                $users = DB::table('users');
                return view('hrd/dashboard_hrd', ['users' => $users]);
            } elseif (Auth::user()->role_id == 3 && Auth::user()->status == 1) {
                $users = DB::table('users');
                return view('admin/dashboard_admin', ['users' => $users]);
            }
            return back()->with('loginVerifikasi', 'User Belum Aktif');
        }
    }
}
