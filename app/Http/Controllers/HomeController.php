<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Category;
use App\Models\Faq;
use App\Models\Product;

class HomeController extends Controller
{
    public function __invoke()
    {
        $activeProducts = Product::query()
            ->whereRaw('"is_active" is true')
            ->with('category')
            ->latest()
            ->get();

        $products = Product::query()
            ->whereRaw('"is_active" is true')
            ->with('category')
            ->latest()
            ->paginate(12);

        return view('home', [
            'products' => $products,
            'featuredProducts' => $activeProducts->where('is_featured', true)->take(8)->values(),
            'discountProducts' => $activeProducts
                ->filter(fn (Product $product): bool => ! empty($product->compare_price) && $product->compare_price > $product->price)
                ->take(4)
                ->values(),
            'socialProducts' => $activeProducts->take(4)->values(),
            'categories' => Category::query()->whereRaw('"is_active" is true')->orderBy('sort_order')->limit(8)->get(),
            'faqs' => Faq::query()->whereRaw('"is_active" is true')->orderBy('sort_order')->limit(8)->get(),
            'blogPosts' => BlogPost::query()->whereRaw('"is_published" is true')->latest('published_at')->limit(4)->get(),
        ]);
    }
}
