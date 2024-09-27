<?php

namespace App\Models;

use App\Notifications\TicketClosed;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'subject',
        'description',
        'response',
        'status',
        'responded_by',
    ];

    public function responder()
    {
        return $this->belongsTo(User::class, 'responded_by');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }



    // public function toggleStatusAndNotify()
    // {
    //     Log::info('Toggling ticket ID: ' . $this->id); 
    //     Log::info('Current status before toggle: ' . $this->status);

    //     // Toggle the status
    //     $this->status = $this->status ? 0 : 1;  // Explicitly set 0 or 1 based on current value
    //     $this->save();

    //     Log::info('New status after toggle: ' . $this->status); // This should now log correctly

    //     if ($this->status === 0) {
    //         $user = $this->user;
    //         if ($user && $user->hasRole('user')) {
    //             $user->notify(new TicketClosed($this));
    //             Log::info('Notification sent to user ID: ' . $user->id); 
    //         }
    //     }
    // }

    public function toggleStatusAndNotify($record,$state)
    {
        

        
        if ($state === false) {
            $user = $record->user;
            // dd($user);
            if ($user && $user->hasRole('user')) {
                $user->notify(new TicketClosed($this));
                Log::info('Notification sent to user ID: ' . $user->id);
            } else {
                Log::warning('User not found or does not have the "user" role.');
            }
        } else {
            Log::info('Ticket is open, no notification sent.');
        }
    }
}
