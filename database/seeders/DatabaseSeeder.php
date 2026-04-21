<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use App\Models\Category;
use App\Models\ContactMethod;
use App\Models\Faq;
use App\Models\Page;
use App\Models\Product;
use App\Models\SiteSetting;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->updateOrCreate(['email' => 'admin@example.com'], [
            'name' => 'Admin',
            'password' => 'password',
        ]);

        $category = Category::query()->firstOrCreate(['slug' => 'ai-accounts'], [
            'name' => 'اکانت‌های هوش مصنوعی',
            'description' => 'خرید انواع اکانت AI',
        ]);

        Product::query()->firstOrCreate(['slug' => 'chatgpt-plus'], [
            'category_id' => $category->id,
            'name' => 'اکانت ChatGPT Plus',
            'short_description' => 'اکانت آماده با تحویل فوری',
            'description' => 'مناسب تولید محتوا، برنامه‌نویسی و استفاده حرفه‌ای از مدل‌های پیشرفته.',
            'price' => 1290000,
            'compare_price' => 1490000,
            'is_featured' => true,
            'delivery_notes' => 'تحویل بین ۵ تا ۳۰ دقیقه کاری.',
            'guarantee_notes' => 'گارانتی تعویض و پشتیبانی فعال.',
        ]);

        SiteSetting::getOrCreateDefault();

        Faq::query()->firstOrCreate(['question' => 'زمان تحویل اکانت چقدر است؟'], [
            'answer' => 'در اکثر موارد کمتر از ۳۰ دقیقه تحویل انجام می‌شود.',
        ]);

        BlogPost::query()->firstOrCreate(['slug' => 'best-ai-subscriptions'], [
            'title' => 'بهترین اشتراک‌های AI برای سال ۲۰۲۶',
            'excerpt' => 'راهنمای سریع انتخاب اشتراک مناسب.',
            'content' => 'در این مقاله اشتراک‌های محبوب را بررسی می‌کنیم.',
            'is_published' => true,
            'published_at' => now(),
        ]);

        Page::query()->firstOrCreate(['slug' => 'refund-policy'], [
            'title' => 'سیاست بازگشت وجه',
            'content' => 'جزئیات شرایط بازگشت وجه و قوانین خدمات.',
        ]);

        ContactMethod::query()->firstOrCreate(['title' => 'تلگرام'], [
            'type' => 'telegram',
            'value' => '@newgpt_support',
            'link' => 'https://t.me/newgpt_support',
        ]);
    }
}
