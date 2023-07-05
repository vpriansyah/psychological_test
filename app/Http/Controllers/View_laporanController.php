<?php

namespace App\Http\Controllers;

use App\Models\Hasil_tes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class View_laporanController extends Controller
{

    public function index()
    {
        $data2 = DB::table('users')->where('role_id', '=', 1)->count();
        $sudah_mengerjakan = DB::table('hasil_test')->count();
        $user_aktif = DB::table('users')->where('role_id', '=', 1)->where('status', '=', 1)->count();
        $kategori = DB::table('kategori_tes')->first();
        $data = Hasil_tes::with('user')->orderByDesc('id')->paginate(5);
        return view('hrd.view_laporan', compact('data', 'kategori', 'data2', 'user_aktif', 'sudah_mengerjakan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function print()
    {
        $data2 = DB::table('users')->where('role_id', '=', 1)->count();
        $sudah_mengerjakan = DB::table('hasil_test')->count();
        $user_aktif = DB::table('users')->where('role_id', '=', 1)->where('status', '=', 1)->count();
        $kategori = DB::table('kategori_tes')->first();
        $data = Hasil_tes::with('user')->orderByDesc('id')->get();

        return view('hrd.print', compact('data', 'kategori', 'data2', 'sudah_mengerjakan', 'user_aktif'));
    }

    public function sendLolos($receiver, $subject)
    {
        if ($this->isOnline()) {
            $email = [
                'recepient' => $receiver,
                'fromEmail' => 'psychologicaltest@monstergroup.com',
                'fromName' => 'Monster Group',
                'subject' => $subject,
            ];

            Mail::send('email.email_lolos', $email, function ($message) use ($email) {
                $message->from($email['fromEmail'], $email['fromName']);
                $message->to($email['recepient']);
                $message->subject($email['subject']);
            });
        }
    }

    public function sendTidakLolos($receiver, $subject)
    {
        if ($this->isOnline()) {
            $email = [
                'recepient' => $receiver,
                'fromEmail' => 'psychologicaltest@monstergroup.com',
                'fromName' => 'Monster Group',
                'subject' => $subject,
            ];

            Mail::send('email.email_tidak_lolos', $email, function ($message) use ($email) {
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


    public function lolos(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required',
        ]);

        $receiver = $validatedData['email'];
        $subject = 'Hasil Psikotes';

        $this->sendLolos($receiver, $subject);
        return redirect('/view_laporan')->with('success', 'Email telah berhasil dikirim');
    }

    public function tidak_lolos(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required',
        ]);

        $receiver = $validatedData['email'];
        $subject = 'Hasil Psikotes';

        $this->sendTidakLolos($receiver, $subject);
        return redirect('/view_laporan')->with('success', 'Email telah berhasil dikirim');
    }
}
