<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TicketResource\Pages;
use App\Filament\Resources\TicketResource\Widgets\TicketsOverview;
use App\Models\Ticket;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\ToggleColumn;

class TicketResource extends Resource
{
    protected static ?string $model = Ticket::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('subject'),
                Tables\Columns\TextColumn::make('description'),
                TextColumn::make('response')->label('Response'),
                Tables\Columns\TextColumn::make('responder.name')
                    ->label('Responded By'),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('User Name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('user.email')->label('User Email'),
                ToggleColumn::make('status')
                    ->label('Status')
                    ->onColor('success') 
                    ->offColor('danger') 
                    ->onIcon('heroicon-s-check-circle')
                    ->offIcon('heroicon-s-x-circle')
                    ->sortable()
                   
                    ->afterStateUpdated(function ($record, $state) {
                        if ($state === false) {
                            $record->toggleStatusAndNotify($record,$state);
                        }
                    })





            ])
            ->filters([
                //
            ])
            ->actions([

                // Action::make('toggleStatus')
                //     ->label(fn(Ticket $record) => $record->status ? 'Close Ticket' : 'Open Ticket')

                //     ->icon(fn(Ticket $record) => $record->status ? 'heroicon-s-lock-closed' : 'heroicon-s-lock-open')
                //     ->color(fn(Ticket $record) => $record->status ? 'danger' : 'success')
                //     ->requiresConfirmation()
                //     ->action(fn(Ticket $record) => $record->toggleStatusAndNotify())
                //     ->button()

                //     ->outlined(),

                Action::make('Respond')
                    ->label('Post Response')
                    ->form([
                        Textarea::make('response')
                            ->label('Admin Response')
                            ->required(),
                    ])
                    ->action(function (Ticket $record, array $data) {

                        $record->update(['response' => $data['response'], 'responded_by' => auth()->id()]);
                    })
                    ->requiresConfirmation()
                    ->modalHeading('Respond to Ticket')
                    ->modalSubmitActionLabel('Submit Response')
                    ->color('success')
                    ->requiresConfirmation()
                    ->button()
                    ->outlined(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListTickets::route('/'),
            'create' => Pages\CreateTicket::route('/create'),
            'edit' => Pages\EditTicket::route('/{record}/edit'),
        ];
    }
}
