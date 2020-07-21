<?php

namespace App\Listeners\Backend\ProfessionalTitles;

use App\Events\Backend\ProfessionalTitles\ProfessionalTitlesCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ProfessionalTitlesCreatedListener
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
     * @param  ProfessionalTitlesCreated  $event
     * @return void
     */
    public function handle(ProfessionalTitlesCreated $event)
    {
        //
    }
}
