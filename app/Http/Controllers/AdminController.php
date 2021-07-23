<?php

namespace App\Http\Controllers;

use Session;
use App\Models\User;
use App\Models\Address;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        $user = Session::get('user');
        return view('Admin.dashboard', compact('user'));
    }
}
