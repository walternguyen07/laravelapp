<?php

namespace App\Listeners\Backend\ProfessionalTitles;

use App\Events\Backend\ProfessionalTitles\ProfessionalTitlesDeleted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ProfessionalTitlesDeletedListener
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
     * @param  ProfessionalTitlesDeleted  $event
     * @return void
     */
    public function handle(ProfessionalTitlesDeleted $event)
    {
        //
    }
}
