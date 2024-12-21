<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function LoginMethod() {
        return view('Website.OtherLogin');
    }

    public function LoginMahasiswa() {
        return view('ssopage');
    }

    public function Login(Request $request) {
        $credential = $request->validate([
            'nim' => ['string', 'required', 'min:"2', 'max:100'],
            'password' => ['string', 'required', 'min:4', 'max:100'],
        ]);
        if (Auth::guard('Mahasiswa')->attempt($credential)) {
            $request->session()->regenerate();
            return redirect()->intended('/landing-page');
        }
        else {
            return back()->with('authfailed', 'Tidak dapat terhubung ke akun anda');
        }
    }

    public function ShowLandingPage() {
        return view('Website.LandingPage');
    }

    public function Logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return view('Website.LandingPage');
    }
}
