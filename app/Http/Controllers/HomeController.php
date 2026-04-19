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
        return view('home', [
            'featuredProducts' => Product::query()->where('is_active', true)->where('is_featured', true)->with('category')->limit(6)->get(),
            'categories' => Category::query()->where('is_active', true)->orderBy('sort_order')->limit(8)->get(),
            'faqs' => Faq::query()->where('is_active', true)->orderBy('sort_order')->limit(6)->get(),
            'blogPosts' => BlogPost::query()->where('is_published', true)->latest('published_at')->limit(3)->get(),
        ]);
    }
}
