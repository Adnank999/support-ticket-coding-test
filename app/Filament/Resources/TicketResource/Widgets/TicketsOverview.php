<?php

namespace App\Filament\Resources\TicketResource\Widgets;

use App\Models\Ticket;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class TicketsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $totalTickets = Ticket::count();


        $openTickets = Ticket::where('status', 1)->count();


        $closedTickets = Ticket::where('status', 0)->count();



        return [
            Stat::make('Total Tickets', $totalTickets)
                ->description('10 new this week') 
                ->descriptionIcon('heroicon-s-arrow-trending-up')
                ->color('success'),
    
            Stat::make('Open Tickets', $openTickets)
                ->description("$openTickets open tickets")
                ->descriptionIcon('heroicon-s-document-check')
                ->color('warning'),
    
            Stat::make('Closed Tickets', $closedTickets)
                ->description("$closedTickets closed this week")
                ->descriptionIcon('heroicon-s-ticket')
                ->color('danger'),
        ];
    }
}
