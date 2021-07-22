<?php

namespace App\Http\Controllers;

use Session;
use App\Models\User;
use App\Models\Address;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function welcome()
    {
        $user = Session::get('user');
        return view('welcome', compact('user'));
    }

    public function product()
    {
        $user = Session::get('user');
        return view('product', compact('user'));
    }

    public function login()
    {
        $user = Session::get('user');
        return view('login', compact('user'));
    }

    public function check(Request $request)
    {
        $data = User::where('email', $request->email)->where('password', $request->password)->first();
        if ($data) {
            $request->session()->put('logged_in', true);
            $request->session()->put('user', $data);
            return redirect()->action([UserController::class, 'welcome']);
        } else {
            return redirect()->action([UserController::class, 'login']);
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect()->action([UserController::class, 'welcome']);
    }

    public function register()
    {
        $user = Session::get('user');
        return view('register', compact('user'));
    }

    public function store(Request $request)
    {
        $username = $request->username;
        $email = $request->email;
        $password = $request->password;

        $cekData = User::where('email', $request->email)->exists();

        if ($cekData) {
            return redirect()->action([UserController::class, 'login'])->with('gagal', 'Email Has Been Registered');
        }

        if ($password !== $password) {
            return redirect('login');
        } else {
            $user = new User();
            $user->username = $username;
            $user->email = $email;
            $user->password = $password;
            $user->role = "2";

            $user->save();

            $user->address();

            $request->session()->put('logged_in', true);
            $data = User::where('email', $request->email);
            $request->session()->put('user', $data->first());

            return redirect()->action([UserController::class, 'welcome']);
        }
    }

    public function profile()
    {
        $user = Session::get('user');
        $user->load('address');
        // return $user;
        return view('User.profile', compact('user'));
    }
}
