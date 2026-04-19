<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        return view('products.index', [
            'products' => Product::query()->where('is_active', true)->with('category')->latest()->paginate(12),
            'categories' => Category::query()->where('is_active', true)->orderBy('sort_order')->get(),
        ]);
    }

    public function category(Category $category)
    {
        return view('products.index', [
            'products' => Product::query()->where('is_active', true)->where('category_id', $category->id)->with('category')->latest()->paginate(12),
            'categories' => Category::query()->where('is_active', true)->orderBy('sort_order')->get(),
            'currentCategory' => $category,
        ]);
    }

    public function show(Product $product)
    {
        abort_unless($product->is_active, 404);

        return view('products.show', [
            'product' => $product->load('category'),
            'relatedProducts' => Product::query()
                ->where('is_active', true)
                ->where('category_id', $product->category_id)
                ->where('id', '!=', $product->id)
                ->limit(4)
                ->get(),
        ]);
    }
}
