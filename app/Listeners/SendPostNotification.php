<?php

namespace App\Listeners;

use App\Events\PostProcessed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\PostMail;
use Illuminate\Support\Facades\Mail;
use Auth;
use App\Models\User;

class SendPostNotification
{


    /**
     * Create the event listener.
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     */
    public function handle(PostProcessed $event): void
    {
        $users = User::all();
        $postData = $event->post;
        foreach($users as $user){
            Mail::to($user->email)->send(new PostMail($postData));
        }
        //  Mail::to("sahabuddin@gmail.com")->send(new PostMail($postData));


    }
}
