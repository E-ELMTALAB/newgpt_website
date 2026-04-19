<?php

namespace App\Filament\Resources\ContactMethods\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ContactMethodForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([TextInput::make('title')->required(), TextInput::make('type')->required(), TextInput::make('value')->required(), TextInput::make('link'), TextInput::make('sort_order')->numeric()->default(0), Toggle::make('is_active')->default(true)])->columns(2);
    }
}
