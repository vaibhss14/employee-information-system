<?php

namespace App\Filament\Resources\Users\Schemas;

use App\Models\Department;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;

class UserForm
{
    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([

                TextInput::make('name')
                    ->required(),

                TextInput::make('email')
                    ->email()
                    ->required()
                    ->unique(ignoreRecord: true),

                TextInput::make('password')
                    ->password()
                    ->required()
                    ->dehydrateStateUsing(fn ($state) => bcrypt($state))
                    ->dehydrated(fn ($state) => filled($state)),

                Select::make('role')
                    ->options([
                        'admin' => 'Admin',
                        'employee' => 'Employee',
                    ])
                    ->live()
                    ->required(),

                Select::make('department_id')
                    ->label('Department')
                    ->options(Department::pluck('name', 'id')->toArray())
                    ->visible(fn (Get $get) => $get('role') === 'employee')
                    ->required(fn (Get $get) => $get('role') === 'employee'),

                TextInput::make('phone')
                    ->tel()
                    ->visible(fn (Get $get) => $get('role') === 'employee'),

                TextInput::make('salary')
                    ->numeric()
                    ->default(0)
                    ->visible(fn (Get $get) => $get('role') === 'employee'),

                DatePicker::make('joining_date')
                    ->default(now())
                    ->visible(fn (Get $get) => $get('role') === 'employee'),

            ]);
    }
}
