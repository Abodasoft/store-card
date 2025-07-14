<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class AdminController extends Controller
{
public function dashboard()
{
    $categories = Category::all();
    $products = Product::with('category')->get();

    return view('admin.dashboard', compact('categories', 'products'));
}


    // باقي CRUD التصنيفات والمنتجات هنا كما كتبناه سابقًا
}
