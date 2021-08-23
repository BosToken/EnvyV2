<?php

namespace App\Http\Controllers;
use Session;
use App\Models\User;
use App\Models\Address;
use App\Models\Setting;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index()
    {
        $user = Session::get('user');
        $address = User::find($user->id)->addresss()->get();
        $setting = Setting::get();
        
        if ($user) {
            $quantity = User::find($user->id)->carts()->count();
            return view('User.address', compact('user', 'address', 'setting', 'quantity'));
        } else {
            return view('User.address', compact('user', 'address', 'setting'));
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
        $data->main = 'No';
        $data->save();

        return redirect()->action([AddressController::class, 'index']);
    }

    public function destroy($id)
    {
        Address::where('id', $id)->delete();
        return redirect()->action([AddressController::class, 'index']);
    }
}
