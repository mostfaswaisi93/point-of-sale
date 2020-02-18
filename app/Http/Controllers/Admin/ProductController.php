<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();

        return view('admin.products.index')->with('products', $products);
    }
}
