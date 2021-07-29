<?php

namespace App\Http\Controllers;

use Session;
use App\Models\User;
use App\Models\Address;
use App\Models\Product;
use App\Models\Gender;
use App\Models\Type;
use App\Models\Setting;

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
        Product::where('id', $id)->delete();
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

    public function men(){
        $user = Session::get('user');
        $setting = Setting::get();
        $men = Product::where('gender_id', 1)->get();
        return view('men', compact('user', 'men', 'setting'));
    }

    public function woman(){
        $user = Session::get('user');
        $setting = Setting::get();
        $woman = Product::where('gender_id', 2)->get();
        return view('woman', compact('user', 'woman', 'setting'));
    }
    
    public function kid(){
        $user = Session::get('user');
        $setting = Setting::get();
        $kid = Product::where('gender_id', 3)->get();
        return view('kid', compact('user', 'kid', 'setting'));
    }
    
    public function bag(){
        $user = Session::get('user');
        $setting = Setting::get();
        $bag = Product::where('gender_id', 4)->get();
        return view('bag', compact('user', 'bag', 'setting'));
    }
}
