<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo;

    protected function redirectTo()
    {
        return route('authLogin');
    }

    public function __construct()
    {
        return redirect()->route('authLogin');
    }

    public function indexHalaman()
    {
        // dd('masuk');
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        if(auth()->attempt(array('email'=>$email, 'password'=>$password)))
        {
            if(auth()->user()->role == "admin")
            {
                return redirect()->route('admin.index');
            }
            else if(auth()->user()->role == "consumer")
            {
                return redirect()->route('consumer.index');
            }
            else if(auth()->user()->role == "user")
            {
                return redirect()->route('user.index');
            }

        }
        else
        {
            return redirect()->route('authLogin')->with('failed', 'Username atau password salah');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
