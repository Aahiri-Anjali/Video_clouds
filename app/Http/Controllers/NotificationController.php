<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Models\User;
use App\Notifications\DemoNotification;

class NotificationController extends Controller
{
    public function notification()
    {
         $user = User::first();
  
        $details = [
            'greeting' => 'Hi Artisan',
            'body' => 'This is my first notification',
            'action' => 'View My Site',
            'url' => url('/'),
        ];
  
        Notification::send($user, new DemoNotification($details));
   
        dd('done');
    }
}
