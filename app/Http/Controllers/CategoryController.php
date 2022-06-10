<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Categories;
use App\Models\Product;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Categories::all();
        $products = Product::with(['galleries'])->paginate(12);

        return view('pages.category', [
            'categories' => $categories,
            'products' => $products
        ]);
    }

    public function detail(Request $request, $slug)
    {
        $categories = Categories::all();
        $category = Categories::where('slug', $slug)->firstOrFail();
        $products = Product::with(['galleries'])->where('categories_id', $category->id)->paginate(12);

        return view('pages.category', [
            'categories' => $categories,
            'products' => $products
        ]);
    }
}
