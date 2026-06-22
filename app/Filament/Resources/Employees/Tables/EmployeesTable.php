<?php

namespace App\Filament\Resources\Employees\Tables;

use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;



class EmployeesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

            TextColumn::make('employee_code')
    ->label('Employee ID')
    ->searchable()
    ->sortable(),


                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('email')
                    ->searchable(),

                TextColumn::make('phone'),

                TextColumn::make('department.name')
    ->label('Department')
    ->searchable()
    ->sortable(),

                TextColumn::make('salary'),

                TextColumn::make('joining_date')
                    ->date(),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ]);
    }
}