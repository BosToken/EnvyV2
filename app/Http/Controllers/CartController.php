<?php

namespace App\Http\Controllers;

use Session;
use App\Models\User;
use App\Models\Address;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Setting;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        $user = Session::get('user');
        $setting = Setting::get();
        $cart = User::find($user->id)->carts()->get();
        if ($user) {
            $quantity = User::find($user->id)->carts()->count();
            return view('User.cart', compact('user', 'cart', 'setting', 'quantity'));
        } else {
            return view('User.cart', compact('user', 'cart', 'setting'));
        }
    }

    public function store(Request $request, $id)
    {
        $user_id = Session::get('user')->id;
        // $product_id = Product::where('id', $id)->get()->id;
        $product_id = $id;

        $data = new Cart();
        $data->user_id = $user_id;
        $data->product_id = $product_id;
        $data->save();

        // return $product_id;

        return redirect()->action([CartController::class, 'index']);
    }

    public function destroy($id)
    {
        Cart::where('id', $id)->delete();
        return redirect()->action([CartController::class, 'index']);
    }
}
