<?php

namespace App\Http\Controllers;

use Session;
use App\Models\User;
use App\Models\Address;
use App\Models\Product;
use App\Models\Gender;
use App\Models\Type;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $user = Session::get('user');
        $product = Product::get();
        $gender = Gender::get();
        $type = Type::get();
        return view('Admin.addProduct', compact('user', 'product', 'gender', 'type'));
    }
    public function store(Request $request)
    {
        // Product::create([
        //     'name_product' => $request->name_product,
        //     'description_product' => $request->description_product,
        //     'image_product' => $request->image_product,
        //     'quantity_product' => $request->quantity_product,
        //     'price_product' => $request->price_product,
        //     'gender_id' => $request->gender_id,
        //     'type_id' => $request->type_id,
        //     'size' => $request->size,
        //     'color' => $request->color,
        //     'archive' => $request->archive,
        // ]);

        // if ($request->hasFile('image_product')) {
        //     $request->file('image_product')->move('products/', $request->file('image_product')->getClientOriginalName());
        //     $data->image = $request->file('image_product')->getClientOriginalName();
        //     $data->save();
        // }

        // V2

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
        return view('Admin.activeProduct', compact('user', 'product'));
    }

    public function closedProduct()
    {
        $product = Product::get();
        $user = Session::get('user');
        return view('Admin.closedProduct', compact('user', 'product'));
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
        return view('Admin.archiveProduct', compact('user', 'product'));
    }

    public function archiveUpdate(Request $request, $id)
    {
        Product::where('id', $id)->update([
            'archive' => $request->archive
        ]);

        return redirect()->action([ProductController::class, 'archiveProduct']);
    }
}
