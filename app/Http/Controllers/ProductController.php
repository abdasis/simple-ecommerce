<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;

class ProductController extends Controller
{
    public function create()
    {
        return view('layouts.product.create-product');
    }

    public function store(Request $ruquest)
    {
        # code...
    }
}