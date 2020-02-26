<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreRequest;
use Validator;
use App\Models\Store;
use Alert;

class StoreController extends Controller
{
    public function create()
    {
        return view('layouts.store.create-store');
    }

    public function add(StoreRequest $request)
    {
        
    }
}
