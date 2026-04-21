<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_name', 'site_tagline', 'homepage_intro', 'support_phone', 'support_email',
        'telegram', 'instagram', 'footer_text', 'seo_title', 'seo_description', 'homepage_sections',
    ];

    protected function casts(): array
    {
        return [
            'homepage_sections' => 'array',
        ];
    }

    public static function defaultAttributes(): array
    {
        return [
            'site_name' => 'نیو جی‌پی‌تی',
            'site_tagline' => 'مرکز خرید اکانت‌های دیجیتال',
            'homepage_intro' => 'فروش مستقیم اکانت‌های معتبر با تحویل سریع و پشتیبانی واقعی.',
            'footer_text' => 'نیو جی‌پی‌تی | فروش مطمئن اشتراک دیجیتال',
            'seo_title' => 'خرید اشتراک هوش مصنوعی',
            'seo_description' => 'فروش تخصصی اکانت و اشتراک دیجیتال با تحویل سریع',
        ];
    }

    public static function getOrCreateDefault(): self
    {
        return static::query()->firstOrCreate(['id' => 1], static::defaultAttributes());
    }
}
