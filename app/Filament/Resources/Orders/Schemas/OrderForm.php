<?php

namespace App\Filament\Resources\Orders\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class OrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([TextInput::make('order_number')->disabled(), TextInput::make('customer_name')->required(), TextInput::make('customer_email')->email()->required(), TextInput::make('customer_phone')->required(), TextInput::make('status')->required(), TextInput::make('payment_status')->required(), TextInput::make('payment_reference'), TextInput::make('total_amount')->numeric()->required(), Textarea::make('notes')])->columns(2);
    }
}
