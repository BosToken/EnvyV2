<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Cart;
use App\Models\User;
use App\Models\Address;
use App\Models\Product;
use App\Models\Gender;
use App\Models\Type;
use App\Models\Setting;
use App\Models\BankName;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $user = Session::get('user');
        $setting = Setting::get();
        $product = Product::get();
        $gender = Gender::get();
        $type = Type::get();
        return view('Admin.addProduct', compact('user', 'setting', 'product', 'gender', 'type'));
    }

    public function buy(Request $request, $id)
    {
        $user = Session::get('user');
        $main = User::find($user->id)->bankmain()->get();
        // $bank = BankName::get();
        $bank = User::find($user->id)->bank_accounts()->get();
        $setting = Setting::get();
        $product = Product::where('id', $id)->get();
        $address = User::find($user->id)->addressmain()->get();

        if ($user) {
            $quantity = User::find($user->id)->carts()->count();
            return view('User.buyRightAway', compact('user', 'product', 'bank', 'main', 'setting', 'quantity', 'address'));
        } else {
            return view('User.buyRightAway', compact('user', 'product', 'bank', 'main', 'setting', 'address'));
        }
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name_product'     => 'required',
            'description_product'       => 'required',
            'image_product'              => 'required',
            'quantity_product'     => 'required',
            'price_product'       => 'required',
            'gender_id'              => 'required',
            'type_id'     => 'required',
            'size'       => 'required',
            'color'              => 'required',
            'archive' => 'required',
        ]);

        $image = $request->file('image_product');
        $move = "products";

        Product::create([
            'name_product' => $request->name_product,
            'description_product' => $request->description_product,
            'image_product' => $image->getClientOriginalName(),
            'quantity_product' => $request->quantity_product,
            'price_product' => $request->price_product,
            'gender_id' => $request->gender_id,
            'type_id' => $request->type_id,
            'size' => $request->size,
            'color' => $request->color,
            'archive' => $request->archive,
        ]);

        $image->move($move, $image->getClientOriginalName());
        // return $data;   

        return redirect()->action([ProductController::class, 'index']);
    }

    public function destroy($id)
    {
        $availableCarts = Cart::where('product_id', $id)->get();
        if (count($availableCarts) === 0) {
            Product::where('id', $id)->delete();
        } else {
            foreach ($availableCarts as $row) {
                Cart::whereId($row->id)->delete();
            }
            Product::where('id', $id)->delete();

        }

        return redirect()->action([ProductController::class, 'index']);
    }

    public function activeProduct()
    {
        $product = Product::get();
        $user = Session::get('user');
        $setting = Setting::get();
        return view('Admin.activeProduct', compact('user', 'setting', 'product'));
    }

    public function closedProduct()
    {
        $product = Product::get();
        $user = Session::get('user');
        $setting = Setting::get();
        return view('Admin.closedProduct', compact('user', 'setting', 'product'));
    }

    public function closedUpdate(Request $request, $id)
    {
        Product::where('id', $id)->update([
            'quantity_product' => $request->quantity_product
        ]);

        return redirect()->action([ProductController::class, 'closedProduct']);
    }

    public function archiveProduct()
    {
        $product = Product::get();
        $user = Session::get('user');
        $setting = Setting::get();
        return view('Admin.archiveProduct', compact('user', 'setting', 'product'));
    }

    public function archiveUpdate(Request $request, $id)
    {
        Product::where('id', $id)->update([
            'archive' => $request->archive
        ]);

        return redirect()->action([ProductController::class, 'archiveProduct']);
    }

    public function men()
    {
        $user = Session::get('user');
        $setting = Setting::get();
        $men = Product::where('gender_id', 1)->get();
        if ($user) {
            $quantity = User::find($user->id)->carts()->count();
            return view('men', compact('user', 'men', 'setting', 'quantity'));
        } else {
            return view('men', compact('user', 'men', 'setting'));
        }
    }

    public function woman()
    {
        $user = Session::get('user');
        $setting = Setting::get();
        $woman = Product::where('gender_id', 2)->get();
        if ($user) {
            $quantity = User::find($user->id)->carts()->count();
            return view('woman', compact('user', 'woman', 'setting', 'quantity'));
        } else {
            return view('woman', compact('user', 'woman', 'setting'));
        }
    }

    public function kid()
    {
        $user = Session::get('user');
        $setting = Setting::get();
        $kid = Product::where('gender_id', 3)->get();
        if ($user) {
            $quantity = User::find($user->id)->carts()->count();
            return view('kid', compact('user', 'kid', 'setting', 'quantity'));
        } else {
            return view('kid', compact('user', 'kid', 'setting'));
        }
    }

    public function bag()
    {
        $user = Session::get('user');
        $setting = Setting::get();
        $bag = Product::where('gender_id', 4)->get();
        if ($user) {
            $quantity = User::find($user->id)->carts()->count();
            return view('bag', compact('user', 'bag', 'setting', 'quantity'));
        } else {
            return view('bag', compact('user', 'bag', 'setting'));
        }
    }

    public function detail(Request $request, $id)
    {
        $user = Session::get('user');
        $setting = Setting::get();
        $gender = Gender::get();
        $type = Type::get();
        $product = Product::where('id', $id)->get();

        return view('Admin.detailProduct', compact('user', 'setting', 'product', 'gender', 'type'));
    }
    public function update(Request $request, $id)
    {

        Product::where('id', $id)->update([
            'name_product' => $request->name_product,
            'description_product' => $request->description_product,
            'price_product' => $request->price_product,
            'quantity_product' => $request->quantity_product,
            'gender_id' => $request->gender_id,
            'type_id' => $request->type_id,
            'size' => $request->size,
            'color' => $request->color,
            'archive' => $request->archive
        ]);

        return back();
    }

    public function imgUpdate(Request $request, $id)
    {

        $image = $request->file('image_product');
        $move = "products";

        Product::where('id', $id)->update([
            'image_product' => $image->getClientOriginalName()
        ]);

        $image->move($move, $image->getClientOriginalName());

        return back();
    }
}
