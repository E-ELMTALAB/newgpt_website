<?php

namespace App\Filament\Resources\ContactMethods;

use App\Filament\Resources\ContactMethods\Pages\CreateContactMethod;
use App\Filament\Resources\ContactMethods\Pages\EditContactMethod;
use App\Filament\Resources\ContactMethods\Pages\ListContactMethods;
use App\Filament\Resources\ContactMethods\Schemas\ContactMethodForm;
use App\Filament\Resources\ContactMethods\Tables\ContactMethodsTable;
use App\Models\ContactMethod;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ContactMethodResource extends Resource
{
    protected static ?string $model = ContactMethod::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return ContactMethodForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ContactMethodsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListContactMethods::route('/'),
            'create' => CreateContactMethod::route('/create'),
            'edit' => EditContactMethod::route('/{record}/edit'),
        ];
    }
}
