<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Categories;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Categories::take(6)->get();
        $products = Product::with(['galleries'])->take(8)->get();

        return view('pages.home', [
            'categories' => $categories,
            'products' => $products
        ]);
    }
}
