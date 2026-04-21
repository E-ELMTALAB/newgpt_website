<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use App\Models\Category;
use App\Models\ContactMethod;
use App\Models\Faq;
use App\Models\Page;
use App\Models\Product;
use App\Models\SiteSetting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class SharifGptContentSeeder extends Seeder
{
    public function run(): void
    {
        $path = database_path('seeders/sharifgpt_content.json');
        if (! is_file($path)) {
            return;
        }

        $payload = json_decode((string) file_get_contents($path), true);
        if (! is_array($payload)) {
            return;
        }

        $this->seedSiteSetting($payload['site_setting'] ?? []);
        $categoryMap = $this->seedCategories($payload['products'] ?? []);
        $this->seedProducts($payload['products'] ?? [], $categoryMap);
        $this->seedFaqs($payload['faqs'] ?? []);
        $this->seedPosts($payload['posts'] ?? []);
        $this->seedPages($payload['pages'] ?? []);
        $this->seedContactMethods();
    }

    private function seedSiteSetting(array $siteSetting): void
    {
        if ($siteSetting === []) {
            SiteSetting::getOrCreateDefault();

            return;
        }

        SiteSetting::query()->updateOrCreate(
            ['id' => 1],
            [
                'site_name' => $siteSetting['site_name'] ?? 'SharifGPT',
                'site_tagline' => $siteSetting['site_tagline'] ?? null,
                'homepage_intro' => $siteSetting['homepage_intro'] ?? null,
                'support_email' => $siteSetting['support_email'] ?? null,
                'telegram' => $siteSetting['telegram'] ?? null,
                'instagram' => $siteSetting['instagram'] ?? null,
                'footer_text' => $siteSetting['footer_text'] ?? null,
                'seo_title' => $siteSetting['seo_title'] ?? null,
                'seo_description' => $siteSetting['seo_description'] ?? null,
                'homepage_sections' => $siteSetting['homepage_sections'] ?? null,
            ],
        );
    }

    private function seedCategories(array $products): array
    {
        $categories = [];

        foreach ($products as $product) {
            $name = trim((string) ($product['category'] ?? 'محصولات هوش مصنوعی'));
            if ($name === '') {
                $name = 'محصولات هوش مصنوعی';
            }

            $slugSource = $name !== '' ? $name : ((string) ($product['collectionType'] ?? 'category'));
            $slug = Str::slug($slugSource, '-', 'fa');
            if ($slug === '') {
                $slug = 'category-'.substr(md5($name), 0, 8);
            }

            $categories[$slug] = [
                'name' => $name,
                'slug' => $slug,
                'description' => 'دسته‌بندی استخراج‌شده از SharifGPT',
            ];
        }

        ksort($categories);

        $map = [];
        $sort = 0;
        foreach (array_values($categories) as $category) {
            $model = Category::query()->updateOrCreate(
                ['slug' => $category['slug']],
                [
                    'name' => $category['name'],
                    'description' => $category['description'],
                    'is_active' => true,
                    'sort_order' => $sort++,
                    'seo_title' => $category['name'],
                    'seo_description' => $category['description'],
                ],
            );

            $map[$category['name']] = $model->id;
        }

        return $map;
    }

    private function seedProducts(array $products, array $categoryMap): void
    {
        foreach ($products as $product) {
            $slug = $this->extractSlug($product['slug'] ?? null);
            if ($slug === null) {
                continue;
            }

            $name = trim((string) ($product['name'] ?? $slug));
            $categoryName = trim((string) ($product['category'] ?? 'محصولات هوش مصنوعی'));
            $categoryId = $categoryMap[$categoryName] ?? null;
            if (! $categoryId) {
                continue;
            }

            $badges = isset($product['badges']) && is_array($product['badges'])
                ? implode(' | ', array_slice($product['badges'], 0, 2))
                : null;

            $features = isset($product['features']) && is_array($product['features'])
                ? implode("\n", array_slice($product['features'], 0, 6))
                : null;

            Product::query()->updateOrCreate(
                ['slug' => $slug],
                [
                    'category_id' => $categoryId,
                    'name' => $name,
                    'short_description' => $this->limitText($features ?? $product['seoDescription'] ?? '', 240),
                    'description' => $product['description'] ?? null,
                    'price' => 1000000,
                    'compare_price' => null,
                    'is_active' => true,
                    'is_featured' => false,
                    'badge_text' => $this->limitText($badges ?? '', 120),
                    'featured_image' => data_get($product, 'image.asset.url'),
                    'delivery_notes' => 'فعال‌سازی و تحویل طبق شرایط اعلام‌شده در صفحه محصول.',
                    'guarantee_notes' => 'پشتیبانی و شرایط تعویض طبق سیاست‌های SharifGPT.',
                    'seo_title' => $product['seoTitle'] ?? $name,
                    'seo_description' => $this->limitText((string) ($product['seoDescription'] ?? ''), 320),
                ],
            );
        }
    }

    private function seedFaqs(array $faqs): void
    {
        foreach ($faqs as $faq) {
            $question = trim((string) ($faq['question'] ?? ''));
            if ($question === '') {
                continue;
            }

            Faq::query()->updateOrCreate(
                ['question' => $question],
                [
                    'answer' => (string) ($faq['answer'] ?? ''),
                    'group' => (string) ($faq['group'] ?? 'general'),
                    'sort_order' => (int) ($faq['sort_order'] ?? 0),
                    'is_active' => true,
                ],
            );
        }
    }

    private function seedPosts(array $posts): void
    {
        foreach ($posts as $post) {
            $slug = $this->extractSlug($post['slug'] ?? null);
            if ($slug === null) {
                continue;
            }

            $title = trim((string) ($post['title'] ?? $slug));
            $publishedAt = $post['publishedAt'] ?? $post['_createdAt'] ?? null;

            BlogPost::query()->updateOrCreate(
                ['slug' => $slug],
                [
                    'title' => $title,
                    'excerpt' => $this->limitText((string) ($post['excerpt'] ?? ''), 255),
                    'content' => (string) ($post['content'] ?? ''),
                    'featured_image' => data_get($post, 'mainImage.asset.url'),
                    'is_published' => true,
                    'published_at' => $publishedAt ? Carbon::parse($publishedAt) : now(),
                    'seo_title' => data_get($post, 'seo.metaTitle') ?? $title,
                    'seo_description' => $this->limitText((string) (data_get($post, 'seo.metaDescription') ?? ''), 320),
                ],
            );
        }
    }

    private function seedPages(array $pages): void
    {
        foreach ($pages as $page) {
            $slug = trim((string) ($page['slug'] ?? ''));
            $title = trim((string) ($page['title'] ?? ''));
            if ($slug === '' || $title === '') {
                continue;
            }

            Page::query()->updateOrCreate(
                ['slug' => $slug],
                [
                    'title' => $title,
                    'content' => (string) ($page['content'] ?? ''),
                    'is_published' => true,
                    'seo_title' => $page['seo_title'] ?? $title,
                    'seo_description' => $this->limitText((string) ($page['seo_description'] ?? ''), 320),
                ],
            );
        }
    }

    private function seedContactMethods(): void
    {
        ContactMethod::query()->updateOrCreate(
            ['type' => 'telegram', 'value' => '@sharifgptadmin'],
            [
                'title' => 'تلگرام پشتیبانی',
                'link' => 'https://t.me/sharifgptadmin',
                'sort_order' => 0,
                'is_active' => true,
            ],
        );

        ContactMethod::query()->updateOrCreate(
            ['type' => 'email', 'value' => 'support@sharifgpt.ai'],
            [
                'title' => 'ایمیل پشتیبانی',
                'link' => 'mailto:support@sharifgpt.ai',
                'sort_order' => 1,
                'is_active' => true,
            ],
        );
    }

    private function extractSlug(mixed $slug): ?string
    {
        if (is_string($slug) && trim($slug) !== '') {
            return trim($slug);
        }

        if (is_array($slug)) {
            $value = trim((string) ($slug['current'] ?? ''));

            return $value !== '' ? $value : null;
        }

        return null;
    }

    private function limitText(string $text, int $limit): ?string
    {
        $clean = trim($text);

        return $clean === '' ? null : Str::limit($clean, $limit, '');
    }
}

