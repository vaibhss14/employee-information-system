<?php

namespace App\Filament\Resources\Leaves\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

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
                        'approved' => 'success',
                        'rejected' => 'danger',
                        'pending' => 'warning',
                        default => 'gray',
                    }),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'approved' => 'Approved',
                        'rejected' => 'Rejected',
                    ]),
            ])
            ->recordActions([
                EditAction::make(),

                Action::make('approve')
                    ->color('success')
                    ->icon('heroicon-o-check')
                    ->action(fn ($record) => $record->update([
                        'status' => 'approved',
                    ]))
                    ->visible(fn ($record) => $record->status === 'pending'),

                Action::make('reject')
                    ->color('danger')
                    ->icon('heroicon-o-x-mark')
                    ->action(fn ($record) => $record->update([
                        'status' => 'rejected',
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
