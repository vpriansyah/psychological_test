<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Models\Hasil_tes;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CekQuiz
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $hasilTest = Hasil_tes::where('peserta_id', auth()->user()->id)->orderBy('id', 'desc')->first();
        if ($hasilTest != null) {
            $currentYear = date('Y');
            $lastExam = strtotime($hasilTest->updated_at);
            if ($hasilTest->jumlah_poin != null) {
                if ($currentYear == date("Y", $lastExam)) {
                    return redirect()->back()->with('warning', 'Anda pernah mengerjakan ini, Coba lagi tahun depan !');
                }
            }
        }

        return $next($request);
    }
}
