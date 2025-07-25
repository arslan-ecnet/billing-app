<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $products = Product::where('quantity' ,'>', '0')->get();
        return view('home',['products' => $products]);
    }
    public function home2(){
//        $products = Product::where('quantity' ,'>', '0')->get();
        $products = Product::get();
        return view('home2',['products' => $products]);
    }
}
