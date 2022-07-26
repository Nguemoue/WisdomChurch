<?php

namespace App\Listeners;

use App\Events\DeleteEventEvent;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DeleteEventListener implements ShouldQueue
{
    use InteractsWithQueue;

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
     * @param  App\Events\DeleteEventEvent  $event
     * @return void
     */
    public function handle(DeleteEventEvent $event)
    {
        //
        //je recupere les models
        $eventsmodels = $event->collect_events;
        $eventsmodels->each(function ($m){
            Storage::delete($m->poster_url);
        });

    }
}
