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
}
