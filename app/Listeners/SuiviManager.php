<?php

namespace App\Listeners;

use App\Events\ProjectCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SuiviManager
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ProjectCreated  $event
     * @return void
     */
    public function handle(ProjectCreated $event)
    {
        //
       // var_dump($event);
        //die('Die SuiviManager listener');
        Mail::raw('Le projet:'. $event->project->title .'a été créé', function ($message) {
            $message->to('test@test.fr')
                    ->subject('Nouveau projet créé');
        });
    }
}
