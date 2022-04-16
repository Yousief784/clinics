<?php

namespace App\Http\Middleware;

use App\Models\Doctor;
use App\Models\PendingDoctor;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Comment\Doc;

class DoctorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $doctor = Doctor::firstWhere('user_id', Auth::id());
        if ($doctor){
            return $next($request);
        }

        return abort(404);
    }
}
