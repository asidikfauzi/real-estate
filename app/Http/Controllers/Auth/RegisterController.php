<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Helper\Uuid;
use Alert;


class RegisterController extends Controller
{

    public function index()
    {
        return view('auth.register');
    }

    public function registerUser(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
            'name' => 'required|string|max:255',
        ]);

        $user = User::create([
            'id' => Uuid::getId(),
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);

        Alert::success('Success', 'User Berhasil Ditambahkan!');
        return back();
    }
}
