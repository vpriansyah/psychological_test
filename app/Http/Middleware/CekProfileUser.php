<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CekProfileUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $profile = User::where('id', '=', auth()->user()->id)->first();
        if (!$profile->nama_lengkap) {
            return redirect()->route('profile')->with('warning', 'Lengkapi profil anda terlebih dahulu!');
        } elseif (!$profile->posisi_pilihan) {
            return redirect()->route('profile')->with('warning', 'Lengkapi profil anda terlebih dahulu!');
        }

        return $next($request);
    }
}
