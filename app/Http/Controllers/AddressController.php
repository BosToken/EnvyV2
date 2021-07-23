<?php

namespace App\Http\Controllers;
use Session;
use App\Models\User;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
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
        return redirect()->action([UserController::class, 'profile']);
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

        return redirect()->action([UserController::class, 'profile']);
    }

    public function destroy($id)
    {
        Address::where('id', $id)->delete();
        return redirect()->action([UserController::class, 'profile']);
    }
}
