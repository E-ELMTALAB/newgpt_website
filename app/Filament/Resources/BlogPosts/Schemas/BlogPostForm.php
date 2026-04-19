<?php

namespace App\Filament\Resources\BlogPosts\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class BlogPostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([TextInput::make('title')->required(), TextInput::make('slug')->required()->unique(ignoreRecord: true), Textarea::make('excerpt'), RichEditor::make('content')->required()->columnSpanFull(), Toggle::make('is_published'), DateTimePicker::make('published_at'), TextInput::make('seo_title'), Textarea::make('seo_description')])->columns(2);
    }
}
