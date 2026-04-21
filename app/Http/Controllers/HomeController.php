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
            ->whereTrue('is_active')
            ->with('category')
            ->latest()
            ->get();

        return view('home', [
            'featuredProducts' => $activeProducts->where('is_featured', true)->take(8)->values(),
            'discountProducts' => $activeProducts
                ->filter(fn (Product $product): bool => ! empty($product->compare_price) && $product->compare_price > $product->price)
                ->take(4)
                ->values(),
            'socialProducts' => $activeProducts->take(4)->values(),
            'categories' => Category::query()->whereTrue('is_active')->orderBy('sort_order')->limit(8)->get(),
            'faqs' => Faq::query()->whereTrue('is_active')->orderBy('sort_order')->limit(8)->get(),
            'blogPosts' => BlogPost::query()->whereTrue('is_published')->latest('published_at')->limit(4)->get(),
        ]);
    }
}
