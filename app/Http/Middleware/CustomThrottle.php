<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Symfony\Component\HttpFoundation\Response;

class CustomThrottle
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $key = 'contact-form|' . $request->ip();
        if (RateLimiter::tooManyAttempts($key, 2)) {
            return response()->json(['pesan' => 'Maaf anda terdeteksi melakukan spam, silahkan coba beberapa saat lagi'], 429);
        }

        RateLimiter::hit($key, 300); // 60 seconds
        return $next($request);
    }
}