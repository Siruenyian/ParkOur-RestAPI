<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AdminAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $group)
    {
        $user = Auth::user();
        switch ($group) {
            case "user":
                if ($user->group !== "user") return redirect(route('displaytempat'));
                Log::debug($request->route('id'));
                Log::debug($user->id_tempat);
//                user tidak bisa akses id lain
                if ($request->route('id')!==$user->id_tempat) return redirect(route('userdashboard', $user->id_tempat));
                break;
            case "admin":
                if ($user->group !== "admin")
                {
                    switch ($user->group) {
                        case "user":
                            return redirect(route('userdashboard', $user->id_tempat));
                            break;
                        default:
                            return redirect(route('displaytempat'));
                    }
                }
                break;
            default:
                return redirect(route('auth.login'));
        }

        return $next($request);
    }
}
