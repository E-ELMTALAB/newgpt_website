<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Select::make('category_id')->relationship('category', 'name')->required(),
            TextInput::make('name')->required(),
            TextInput::make('slug')->required()->unique(ignoreRecord: true),
            Textarea::make('short_description'),
            Textarea::make('description')->columnSpanFull(),
            TextInput::make('price')->numeric()->required(),
            TextInput::make('compare_price')->numeric(),
            TextInput::make('badge_text'),
            FileUpload::make('featured_image')->image(),
            Textarea::make('delivery_notes'),
            Textarea::make('guarantee_notes'),
            Toggle::make('is_featured'),
            Toggle::make('is_active')->default(true),
            TextInput::make('seo_title'),
            Textarea::make('seo_description'),
        ])->columns(2);
    }
}
