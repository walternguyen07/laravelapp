<?php

namespace App\Listeners\Backend\ProfessionalTitles;

use App\Events\Backend\ProfessionalTitles\ProfessionalTitlesUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ProfessionalTitlesUpdatedListener
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
     * @param  ProfessionalTitlesUpdated  $event
     * @return void
     */
    public function handle(ProfessionalTitlesUpdated $event)
    {
        //
    }
}
