<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function store(Request $request)
    {
        $credential = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
//jika login biasa
        if (Auth::attempt($credential)) {
            $user = Auth::user();
            $request->session()->regenerate();
            switch ($user->group) {
                case "user":
                    return redirect()->route('userdashboard', $user->id_tempat);
                    break;
                case "admin":
                    return redirect()->route('admindashboard');
                    break;
                default:
                    return redirect(route('tempat'));
            }

        } else {
            return redirect()->route('auth.login');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.login');
    }
}
