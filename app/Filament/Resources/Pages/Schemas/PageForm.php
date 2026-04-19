<?php

namespace App\Filament\Resources\Pages\Schemas;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([TextInput::make('title')->required(), TextInput::make('slug')->required()->unique(ignoreRecord: true), RichEditor::make('content')->required()->columnSpanFull(), Toggle::make('is_published')->default(true), TextInput::make('seo_title'), Textarea::make('seo_description')])->columns(2);
    }
}
