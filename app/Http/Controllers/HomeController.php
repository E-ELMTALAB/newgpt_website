<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Category;
use App\Models\Faq;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        $activeProducts = Product::query()
            ->whereRaw('"is_active" is true')
            ->with('category')
            ->latest()
            ->get();

        $homeSections = [
            ['key' => 'ai', 'label' => 'اکانت های هوش مصنوعی'],
            ['key' => 'education', 'label' => 'اکانت های آموزشی'],
            ['key' => 'music', 'label' => 'اکانت های آهنگ'],
            ['key' => 'video', 'label' => 'اکانت های ویدیویی'],
            ['key' => 'payments', 'label' => 'پرداخت ارزی'],
        ];

        $currentSection = (string) $request->query('section', 'ai');
        $allowedSections = collect($homeSections)->pluck('key')->all();
        if (! in_array($currentSection, $allowedSections, true)) {
            $currentSection = 'ai';
        }

        $categories = Category::query()
            ->whereRaw('"is_active" is true')
            ->orderBy('sort_order')
            ->get();

        $sectionCategoryIds = [];
        foreach ($categories as $category) {
            $sectionKey = $this->resolveHomeSection($category);
            if ($sectionKey) {
                $sectionCategoryIds[$sectionKey] ??= [];
                $sectionCategoryIds[$sectionKey][] = $category->id;
            }
        }

        $sectionIds = $sectionCategoryIds[$currentSection] ?? [];

        $productsQuery = Product::query()
            ->whereRaw('"is_active" is true')
            ->with('category')
            ->latest();

        if ($sectionIds !== []) {
            $productsQuery->whereIn('category_id', $sectionIds);
        } else {
            $productsQuery->whereRaw('1 = 0');
        }

        $products = $productsQuery->paginate(12)->withQueryString();

        return view('home', [
            'products' => $products,
            'homeSections' => $homeSections,
            'currentSection' => $currentSection,
            'featuredProducts' => $activeProducts->where('is_featured', true)->take(8)->values(),
            'discountProducts' => $activeProducts
                ->filter(fn (Product $product): bool => ! empty($product->compare_price) && $product->compare_price > $product->price)
                ->take(4)
                ->values(),
            'socialProducts' => $activeProducts->take(4)->values(),
            'categories' => $categories->take(8)->values(),
            'faqs' => Faq::query()->whereRaw('"is_active" is true')->orderBy('sort_order')->limit(8)->get(),
            'blogPosts' => BlogPost::query()->whereRaw('"is_published" is true')->latest('published_at')->limit(4)->get(),
        ]);
    }

    private function resolveHomeSection(Category $category): ?string
    {
        $normalized = Str::lower(trim($category->name.' '.$category->slug));

        if (Str::contains($normalized, ['پرداخت', 'payment', 'currency', 'exchange', 'international'])) {
            return 'payments';
        }

        if (Str::contains($normalized, ['spotify', 'موسیقی', 'اهنگ', 'آهنگ', 'music', 'telegram premium'])) {
            return 'music';
        }

        if (Str::contains($normalized, ['video', 'ویدیو', 'ویدئو', 'ادیت', 'capcut'])) {
            return 'video';
        }

        if (Str::contains($normalized, ['education', 'آموزش', 'زبان', 'learn', 'duolingo'])) {
            return 'education';
        }

        if (Str::contains($normalized, ['ai', 'gpt', 'gemini', 'هوش', 'cursor', 'grok', 'github', 'claude', 'monica', 'leonardo', 'runway', 'midjourney', 'kling', 'canva', 'gamma'])) {
            return 'ai';
        }

        return 'ai';
    }
}
