<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductsController extends Controller
{
    public function index()
    {
      $products  = Product::get();

      return view('products.index',compact('products'));

    }
}
