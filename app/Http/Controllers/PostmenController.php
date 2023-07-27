<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostmenController extends Controller
{

    public function profile()
    {
        $data = DB::table('users')->get();

        if (isset($data)) {
            return response()->json([
                'user' => $data
            ]);
        } else {
            return response()->json([
                'error' => 'data not found'
            ]);
        }
    }

    public function soal()
    {
        $data = DB::table('paket_soal')->get();

        if (isset($data)) {
            return response()->json([
                'soal' => $data
            ]);
        } else {
            return response()->json([
                'error' => 'data not found'
            ]);
        }
    }

    public function posisi()
    {
        $data = DB::table('posisi')->get();

        if (isset($data)) {
            return response()->json([
                'data' => $data
            ]);
        } else {
            return response()->json([
                'error' => 'data not found'
            ]);
        }
    }

    public function rules()
    {
        $data = DB::table('rules')->get();

        if (isset($data)) {
            return response()->json([
                'rules' => $data
            ]);
        } else {
            return response()->json([
                'error' => 'data not found'
            ]);
        }
    }

    public function alur()
    {
        $data = DB::table('alur')->get();

        if (isset($data)) {
            return response()->json([
                'alur' => $data
            ]);
        } else {
            return response()->json([
                'error' => 'data not found'
            ]);
        }
    }

    public function laporan()
    {
        $data = DB::table('hasil_test')->get();

        if (isset($data)) {
            return response()->json([
                'laporan' => $data
            ]);
        } else {
            return response()->json([
                'error' => 'data not found'
            ]);
        }
    }
}
