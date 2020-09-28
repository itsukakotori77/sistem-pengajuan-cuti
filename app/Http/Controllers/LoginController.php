<?php

namespace App\Http\Controllers;

use Auth;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    //
    public function loginView()
    {
        return view('Otentikasi.login');
    }

    public function login(Request $request)
    {
        // Validasi
        $messages = [
            "email.required" => "Tolong masukkan Email ",
            "email.email" => "Email tidak valid",
            "email.exists" => "Email tidak tersedia",
            "password.required" => "Tolong Masukkan Password",
            "password.exists" => "Password yang dimasukan salah"
        ];

        // Validasi
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|exists:users,email',
            'password' => 'required|string|max:199'
        ], $messages);


        // Cek Kontrol
        if($validator->fails())
        {
            return back()->withErrors($validator)->withInput();
        }
        elseif(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1, 'role' => 1], $request->remember))
        {
            return redirect('/home');
        }
        elseif(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1, 'role' => 2], $request->remember))
        {
            return redirect('/home');
        }
        elseif(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1, 'role' => 3], $request->remember))
        {
            return redirect('/pengajuan/cuti');
        }
        elseif(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1, 'role' => 4], $request->remember))
        {
            return redirect('/pengajuan/cuti');
        }
        elseif(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1, 'role' => 5], $request->remember))
        {
            return redirect('/pengajuan/cuti');
        }

        return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors([
            'approve' => 'Salah password atau akun ini tidak tersedia.',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function forgotView()
    {
        return view('Otentikasi.forgot');
    }
}
