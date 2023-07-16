<?php

namespace App\Http\Controllers;

use App\Models\Hasil_tes;
use App\Models\Poin;
use App\Models\Tata_tertib;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function take_code()
    {
        return view('user.take_code');
    }

    public function index()
    {
        $informasi = DB::table('informasi_kategori')->get();
        $data = Tata_tertib::all();
        return view('user.exam', compact('data', 'informasi'));
    }


    public function sendKode($receiver, $subject, $kode)
    {
        if ($this->isOnline()) {
            $email = [
                'recepient' => $receiver,
                'fromEmail' => 'psychologicaltest@monstergroup.com',
                'fromName' => 'Monster Group',
                'subject' => $subject,
                'kode' => $kode,
            ];

            Mail::send('email.email_kode', $email, function ($message) use ($email) {
                $message->from($email['fromEmail'], $email['fromName']);
                $message->to($email['recepient']);
                $message->subject($email['subject']);
            });
        }
    }

    public function isOnline($site = "https://www.youtube.com/")
    {
        if (@fopen($site, "r")) {
            return true;
        } else {
            return false;
        }
    }


    public function addHasilTest()
    {
        $condition = Hasil_tes::where('peserta_id', Auth::user()->id)->first();
        $receiver = Auth::user()->email;
        $subject = 'Kode Unik Pengerjaan';
        $kode = 0;
        if ($condition == null) {
            $otp = rand(1000, 9999);
            Hasil_tes::create([
                'peserta_id' => Auth::user()->id,
                'otp' => $otp,
            ]);
            $kode = $otp;

            $this->sendKode($receiver, $subject, $kode);
        } else {
            $kode = $condition->otp;
            $this->sendKode($receiver, $subject, $kode);
        }

        return redirect('/take_code');
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


    public function add_kode(Request $request)
    {
        $otp = $request->kode;
        $user = Hasil_tes::where('peserta_id', Auth::user()->id)->first();
        //check otp correct or not
        if ($otp == $user->otp) {
            return redirect('/quiz')->with('success', 'Kode Unik Pengerjaan Benar, Selamat Mengerjakan.');
        }

        return back()->with('error', 'Kode Unik Pengerjaan Salah.');
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
