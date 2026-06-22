<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Forms;

class UserForm
{
    public static function form(Schema $schema): Schema
{
    return $schema
        ->schema([
            Forms\Components\TextInput::make('name')
                ->required(),

            Forms\Components\TextInput::make('email')
                ->email()
                ->required()
                ->unique(ignoreRecord: true),

            Forms\Components\TextInput::make('password')
                ->password()
                ->required()
                ->dehydrateStateUsing(fn ($state) => bcrypt($state))
                ->dehydrated(fn ($state) => filled($state)),

            Forms\Components\Select::make('role')
                ->options([
                    'admin' => 'Admin',
                    'employee' => 'Employee',
                ])
                ->required(),
        ]);
}
}
