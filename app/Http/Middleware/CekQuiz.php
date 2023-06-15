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
        $profile = Hasil_tes::where('peserta_id', auth()->user()->id)->first();
        // dd($profile);

        if ($profile->jumlah_poin != null) {
            return redirect()->route('exam')->with('warning', 'Anda pernah mengerjakan quiz ini !');
        }

        return $next($request);
    }
}
