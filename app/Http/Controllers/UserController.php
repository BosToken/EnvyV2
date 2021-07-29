<?php

namespace App\Http\Controllers;

use Session;
use App\Models\User;
use App\Models\Address;
use App\Models\Product;
use App\Models\Setting;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function welcome()
    {
        $user = Session::get('user');
        $setting = Setting::get();
        // return $setting;
        return view('welcome', compact('user', 'setting'));
    }

    public function product()
    {
        $product = Product::where('archive', 1)->get();
        $user = Session::get('user');
        $setting = Setting::get();
        return view('product', compact('user', 'product', 'setting'));
    }

    public function login()
    {
        $user = Session::get('user');
        $setting = Setting::get();
        return view('login', compact('user', 'setting'));
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
        $setting = Setting::get();
        return view('register', compact('user', 'setting'));
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

            $request->session()->put('logged_in', true);
            $data = User::where('email', $request->email);
            $request->session()->put('user', $data->first());

            return redirect()->action([UserController::class, 'welcome']);
        }
    }

    public function profile()
    {
        $user = Session::get('user');
        $address = User::find($user->id)->addresss()->get();
        $setting = Setting::get();
        // $user->load('address');
        // return $user;
        // return $address;
        return view('User.profile', compact('user', 'address', 'setting'));
    }

    public function profileUsername(Request $request, $id)
    {
        User::where('id', $id)->update([
            'username' => $request->username
        ]);
        $data = User::where('id', $id)->first();
        $request->session()->put('user', $data);
        return redirect()->action([UserController::class, 'profile']);
    }

    public function profilePhone(Request $request, $id)
    {
        User::where('id', $id)->update([
            'phone' => $request->phone
        ]);
        $data = User::where('id', $id)->first();
        $request->session()->put('user', $data);
        return redirect()->action([UserController::class, 'profile']);
    }

}
