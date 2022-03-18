<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class TestController extends Controller
{
    public function welcome()
    {
        $products = Product::all();
        //$products = Product::paginate(10);
        return view('welcome')->with(compact('products'));
    }
}
