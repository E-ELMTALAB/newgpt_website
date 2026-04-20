<?php

namespace App\Filament\Resources\SiteSettings\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SiteSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([TextInput::make('site_name')->required(), TextInput::make('site_tagline'), Textarea::make('homepage_intro')->columnSpanFull(), TextInput::make('support_phone'), TextInput::make('support_email')->email(), TextInput::make('telegram'), TextInput::make('instagram'), Textarea::make('footer_text'), TextInput::make('seo_title'), Textarea::make('seo_description')])->columns(2);
    }
}
