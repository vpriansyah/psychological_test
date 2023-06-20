<?php

namespace App\Http\Controllers;

use App\Models\Hasil_tes;
use App\Models\Poin;
use App\Models\Tata_tertib;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Tata_tertib::all();
        return view('user.exam', compact('data'));
    }

    public function addHasilTest()
    {
        $condition = Hasil_tes::where('peserta_id', Auth::user()->id)->first();
        if ($condition == null) {
            Hasil_tes::create([
                'peserta_id' => Auth::user()->id,
            ]);
        }

        return redirect('/quiz');
    }

    public function indexquiz(Request $request)
    {
        $selectedRadio = session('flexRadioDefault{{ $soal->id }}', '');

        $tkp = DB::table('paket_soal')->where('kategori_id', '1')->get();

        // Mendapatkan nilai terakhir dari session
        $selectedOption = Session::get('paket_soal');

        // Jika ada input baru dari form, update nilai session dengan nilai yang baru
        if ($request->has('paket_soal')) {
            $selectedOption = $request->input('paket_soal');
            Session::put('paket_soal', $selectedOption);
        }

        return view('user.quiz', compact('tkp', 'selectedRadio'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function submit(Request $request)
    {
        $datas = $request->all();
        $jumlah = 0;

        foreach ($datas as $key => $value) {
            if ($key != '_token') {
                $jumlah += (int) $value;
            }
        }


        $hasil = [];
        $hasil['jumlah_poin'] = $jumlah;
        // $hasil['peserta_id'] = Auth::user()->id;'
        $hasilTest = Hasil_tes::where('peserta_id', Auth::user()->id)->first();
        $hasilTest->update($hasil);
        $selectedRadio = $request->input('flexRadioDefault{{ $soal->id }}');
        session(['selectedRadio' => $selectedRadio]);

        return redirect('/result')->with('success', 'Data telah berhasil telah tersimpan');
    }

    public function result()
    {
        return view('user.result');
    }
}
