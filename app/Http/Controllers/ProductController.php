<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
use App\Models\Store;
use App\Models\Product;
use Auth;
use Validator;
class ProductController extends Controller
{
    public function create()
    {
        // get all store where user login 
        $stores = Store::where('user_id', Auth::user()->id)->get();

        // return view with data store
        return view('layouts.product.create-product')->with(['stores' => $stores]);
    }

    public function store(Request $request)
    {
        // create message on error validate
        $messages = [
            'name.required' => 'Nama product harus diisi',
            'name.min'  => 'Nama product minimal :min karakter',
            'price.required'    => 'Harga harus diisi',
            'store_id.required'    => 'Nama penjual harus diisi'
        ];

        // create rule validator on submit form 
        $rules = [
            'name' => 'required|min:3',
            'price' => 'required|min:3',
            'store_id'  => 'required',
        ];

        // create validator funtion 
        $validator = Validator::make($request->all(), $rules, $messages);

        // if error validation 
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // if success validation 
        $product = Product::create([
            'store_id'  => $request->store_id,
            'name'  =>  $request->name,
            'price' =>  (int) $request->price
        ]);

        // if success store data
        Alert::success('Success', 'Product has been saved');

        // redirect to list product
        return redirect()->route('product.list');  
    }

    public function list()
    {
        // get all product from table product
        $products = Product::all();

        // return to view product list with data product
        return view('layouts.product.list-product')->with(['products' => $products]);
    }

    public function edit($id)
    {
        // get data with selected id
        $product = Product::findOrFail($id);

        // get data all store 
        $stores = Store::where('user_id' , Auth::user()->id)->get();

        // parse to view wtih data product selected
        return view('layouts.product.edit-product')->with(['product' => $product, 'stores' => $stores]);
    }

    public function update($id, Request $request)
    {
        // create message on error validate
        $messages = [
            'name.required' => 'Nama product harus diisi',
            'name.min'  => 'Nama product minimal :min karakter',
            'price.required'    => 'Harga harus diisi',
            'store_id.required'    => 'Nama penjual harus diisi'
        ];

        // create rule validator on submit form 
        $rules = [
            'name' => 'required|min:3',
            'price' => 'required|min:3',
            'store_id'  => 'required',
        ];

        // create validator funtion 
        $validator = Validator::make($request->all(), $rules, $messages);

        // if error validation 
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // get product with selected id
        $product = Product::findOrFail($id);

        // run query update 
        $product->update([
            'store_id' => $request->store_id,
            'name'  =>  $request->name,
            'price'    => $request->price
        ]);

        // if success updated
        Alert::success('Success', 'Data has been updated');

        // redirect after update
        return redirect()->route('product.list');
    }

    public function delete($id)
    {
        // get data product with id
        $product = Product::findOrFail($id);

        // run query delete 
        $product->delete();

        // if success delete data
        Alert::success('Success', 'Data has been delete');

        // redirect after delete
        return redirect()->route('product.list');
    }
}