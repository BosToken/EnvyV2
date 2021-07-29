<?php

namespace App\Http\Controllers;

use Session;
use App\Models\User;
use App\Models\Address;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $user = Session::get('user');
        $setting = Setting::get();
        return view('Admin.appsetting', compact('user', 'setting'));
    }

    public function email(Request $request, $id)
    {
        Setting::where('id', $id)->update([
            'email_app' => $request->email_app
        ]);
        return redirect()->action([SettingController::class, 'index']);
    }

    public function instagram(Request $request, $id)
    {
        Setting::where('id', $id)->update([
            'instagram_app' => $request->instagram_app
        ]);
        return redirect()->action([SettingController::class, 'index']);
    }

    public function whatsapp(Request $request, $id)
    {
        Setting::where('id', $id)->update([
            'whatsapp_app' => $request->whatsapp_app
        ]);
        return redirect()->action([SettingController::class, 'index']);
    }

    public function title(Request $request, $id)
    {
        Setting::where('id', $id)->update([
            'title_app' => $request->title_app
        ]);
        return redirect()->action([SettingController::class, 'index']);
    }
}
