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

    // ✅ إضافة تصنيف
    public function addCategory(Request $request)
    {
        Category::create($request->only('name', 'description', 'image', 'is_active'));
        return back()->with('success', 'تمت إضافة التصنيف');
    }

    // ✅ تعديل تصنيف
    public function editCategory(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->only('name', 'description', 'image', 'is_active'));

        return back()->with('success', 'تم تعديل التصنيف');
    }

    // ✅ حذف تصنيف
    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return back()->with('success', 'تم حذف التصنيف');
    }

    // ✅ إضافة منتج
    public function addProduct(Request $request)
    {
        Product::create($request->only('category_id', 'name', 'description', 'price', 'stock', 'image', 'is_active'));
        return back()->with('success', 'تمت إضافة المنتج');
    }

    // ✅ تعديل منتج
    public function editProduct(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->only('category_id', 'name', 'description', 'price', 'stock', 'image', 'is_active'));

        return back()->with('success', 'تم تعديل المنتج');
    }

    // ✅ حذف منتج
    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return back()->with('success', 'تم حذف المنتج');
    }
}
