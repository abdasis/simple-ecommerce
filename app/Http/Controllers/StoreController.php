<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreRequest;
use Validator;
use App\Models\Store;
use Alert;
use Auth;
use Exception;
use Session;

class StoreController extends Controller
{
    public function create()
    {
        return view('layouts.store.create-store');
    }

    public function add(StoreRequest $request)
    {
        try {

            // create store 
            $store = Store::create([
                'user_id' => Auth::user()->id,
                'name'      =>  $request->name,
                'address'   =>  $request->address
            ]);

            // jika berhasil 
            Alert::success('Success', 'Store has been saved');
            // redirect to page add store 
            return redirect()->route('store.create');
        } catch (\Exception $e) {
            // jika gagal 
            report($e);
        }
    }

    public function listStore()
    {
        // get all store data form store table
        $stores = Store::where('user_id', Auth::user()->id)->get();
        return view('layouts.store.list-store')->with(['stores' => $stores]);
    }

    public function editStore($id)
    {
        // get store with id 
        $store = Store::findOrFail($id);
        return view('layouts.store.edit-store')->with(['store' => $store]);
    }

    public function updateStore($id, StoreRequest $request)
    {
        // get data with same id
        $store = Store::findOrFail($id);

        try {

            // if data faced
            $store->update([
                'user_id' => Auth::user()->id,
                'name'      =>  $request->name,
                'address'   =>  $request->address,
            ]);

            // if success updated
            Alert::success('Success', 'Data has been updated');
            return redirect()->route('store.list-store');
        } catch (Exception $e) {
            report($e);
        }
    }

    public function deleteStore($id)
    {
        // get data with id
        $store = Store::findOrFail($id);

        // if data faced
        if ($store->count() > 0) {
            $store->delete();
            Alert::success('Success', 'Store has been deleted');
            return redirect()->back();
        }
    }
}