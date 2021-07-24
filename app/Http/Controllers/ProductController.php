<?php

namespace App\Http\Controllers;

use Session;
use App\Models\User;
use App\Models\Address;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $product = Product::get();
        $user = Session::get('user');
        return view('Admin.addProduct', compact('user', 'product'));
    }
    public function store(Request $request){
        Product::create([
            'name_product' => $request->name_product,
            'description_product' => $request->description_product,
            'image_product' => $request->image_product,
            'quantity_product' => $request->quantity_product,
            'price_product' => $request->price_product,
            'gender_id' => $request->gender_id,
            'type_id' => $request->type_id,
            'size' => $request->size,
            'color' => $request->color,
            'archive' => $request->archive,
        ]);

        if ($request->hasFile('image_product')) {
            $request->file('image_product')->move('products/', $request->file('image_product')->getClientOriginalName());
            $data->image = $request->file('image_product')->getClientOriginalName();
            $data->save();
        }
        // return $data;
        return redirect()->action([ProductController::class, 'index']);
    }

    public function destroy($id)
    {
        Product::where('id', $id)->delete();
        return redirect()->action([ProductController::class, 'index']);
    }
}
