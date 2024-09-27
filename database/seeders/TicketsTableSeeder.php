<?php

namespace Database\Seeders;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $users = User::role('user')->get();
        
       
        $admin = User::role('admin')->first();

       
        $tickets = [
            [
                'user_id' => $users[0]->id,
                'subject' => 'Computer not turning on',
                'description' => 'My computer won’t turn on. The power button doesn’t seem to work.',
                'response' => 'Please check the power connection and try again.',
                'responded_by' => $admin->id,
                'status' => 1,
            ],
            [
                'user_id' => $users[1]->id,
                'subject' => 'Email not syncing',
                'description' => 'Emails are not syncing on my phone.',
                'response' => 'Try to remove and re-add the account in settings.',
                'responded_by' => $admin->id,
                'status' => 0,
            ],
            [
                'user_id' => $users[2]->id,
                'subject' => 'Printer jammed',
                'description' => 'The printer is jammed, and I can’t seem to fix it.',
                'response' => 'Follow the printer manual to clear the paper jam.',
                'responded_by' => $admin->id,
                'status' => 1,
            ],
            [
                'user_id' => $users[3]->id,
                'subject' => 'Software installation request',
                'description' => 'I need Microsoft Word installed on my system.',
                'response' => 'The request has been forwarded to IT for installation.',
                'responded_by' => $admin->id,
                'status' => 0,
            ],
            [
                'user_id' => $users[4]->id,
                'subject' => 'Password reset',
                'description' => 'I forgot my system login password.',
                'response' => 'We have reset your password, please check your email.',
                'responded_by' => $admin->id,
                'status' => 1,
            ]
        ];

     
        foreach ($tickets as $ticket) {
            Ticket::create($ticket);
        }
    }
}
