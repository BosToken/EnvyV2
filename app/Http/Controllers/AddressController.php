<?php

namespace App\Http\Controllers;

use Session;
use App\Models\User;
use App\Models\Address;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AddressController extends Controller
{
    public function index()
    {
        // $addressAPI = Http::get('https://data-wilayah-indonesia.herokuapp.com/province');
        $user = Session::get('user');
        $main = User::find($user->id)->addressmain()->get();
        $address = User::find($user->id)->addresss()->get();
        $setting = Setting::get();

        if ($user) {
            $quantity = User::find($user->id)->carts()->count();
            return view('User.address', compact('user', 'main', 'address', 'setting', 'quantity', 'addressAPI'));
        } else {
            return view('User.address', compact('user', 'main', 'address', 'setting', 'addressAPI'));
        }
    }

    public function update(Request $request, $id)
    {
        Address::where('id', $id)->update([
            'country' => $request->country,
            'province' => $request->province,
            'city' => $request->city,
            'address' => $request->address,
            'post' => $request->post,
        ]);
        // $data = User::where('id', $id)->first();
        // $request->session()->put('user', $data);
        return redirect()->action([AddressController::class, 'index']);
    }

    public function store(Request $request)
    {
        $user_id = Session::get('user')->id;
        $country = $request->country;
        $province = $request->province;
        $city = $request->city;
        $address = $request->address;
        $post = $request->post;

        $data = new Address();
        $data->user_id = $user_id;
        $data->country = $country;
        $data->province = $province;
        $data->city = $city;
        $data->address = $address;
        $data->post = $post;
        $data->save();

        return redirect()->action([AddressController::class, 'index']);
    }

    public function destroy($id)
    {
        Address::where('id', $id)->delete();
        return redirect()->action([AddressController::class, 'index']);
    }

    public function changeMain(Request $request, $id)
    {
        $user = Session::get('user');
        User::find($user->id)->update([
            'address_main_id' => $id
        ]);
        $data = User::where('id', $user->id)->first();
        $request->session()->put('user', $data);
        return redirect()->action([AddressController::class, 'index']);
    }
}
