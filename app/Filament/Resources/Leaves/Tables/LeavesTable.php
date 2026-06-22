<?php

namespace App\Filament\Resources\Leaves\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Actions\Action;

class LeavesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('employee.name')
                    ->searchable(),

                TextColumn::make('leave_type'),

                TextColumn::make('start_date')
                    ->date(),

                TextColumn::make('end_date')
                    ->date(),

                TextColumn::make('status')
                    ->badge(),

                TextColumn::make('created_at')
                    ->dateTime(),

                    TextColumn::make('status')
    ->badge()
    ->color(fn (string $state): string => match ($state) {
        'Approved' => 'success',
        'Rejected' => 'danger',
        'Pending' => 'warning',
        default => 'gray',
    }),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'Pending' => 'Pending',
                        'Approved' => 'Approved',
                        'Rejected' => 'Rejected',
                    ]),
            ])
            ->recordActions([
    EditAction::make(),

    Action::make('approve')
        ->color('success')
        ->icon('heroicon-o-check')
        ->action(fn ($record) => $record->update([
            'status' => 'Approved',
        ]))
        ->visible(fn ($record) => $record->status === 'Pending'),

    Action::make('reject')
        ->color('danger')
        ->icon('heroicon-o-x-mark')
        ->action(fn ($record) => $record->update([
            'status' => 'Rejected',
        ]))
        ->visible(fn ($record) => $record->status === 'Pending'),
])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}