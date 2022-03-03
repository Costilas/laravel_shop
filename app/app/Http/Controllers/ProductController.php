<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $title = 'Home';
        $products = Product::with(['category', 'status'])->orderBy('id')->paginate(8);
        return view('product.index', compact('title', 'products'));
    }

    public function show($slug)
    {
        return view('product.single');
    }
}
