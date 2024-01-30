<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class VerifyRateLimiter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $maxAttempts = 5;
        $decaySeconds = 60;

        $key = 'rate_limit_' . $request->ip();

        if (Session::has($key)) {
            $rateLimit = Session::get($key);

            if ($rateLimit['attempts'] >= $maxAttempts && time() - $rateLimit['timestamp'] <= $decaySeconds) {
                // Here you can redirect or return a custom response
                return redirect()->back()->with('error', 'Terlalu banyak percobaan, silahkan tunggu 1 menit lagi.');
            }

            if (time() - $rateLimit['timestamp'] > $decaySeconds) {
                Session::forget($key);
            }
        }

        return $next($request);
    }
}
