<?php

namespace App\Http\Controllers;

use App\Models\Alur;
use Illuminate\Http\Request;

class ViewUserController extends Controller
{
    public function index()
    {

        $data = Alur::orderBy('urutan')->get();
        return view('user.dashboard_user', compact('data'));
    }
}
