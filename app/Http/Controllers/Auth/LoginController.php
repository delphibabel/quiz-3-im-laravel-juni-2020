<?php

namespace App\Http\Controllers\Auth;

use App\AuthModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\VarDumper\VarDumper;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    function index()
    {
        return view('auth');
    }
    public function store(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $data = AuthModel::where('email', $email)->first();
        if ($data) {
            if ($password == $data->password) {
                echo "password benar";
                Session::put('name', $data->name);
                Session::put('email', $data->email);
                Session::put('user_id', $data->user_id);
                Session::put('login', TRUE);
                return redirect('/');
            } else {
                return redirect('auth')->with('alert', 'Password yang anda masukan salah');
            }
        } else {
            return redirect('auth')->with('alert', 'Email tidak terdaftar');
        }
    }
    public function logout()
    {
        Session::flush();
        return redirect('auth')->with('alert', 'Kamu sudah logout');
    }
}
