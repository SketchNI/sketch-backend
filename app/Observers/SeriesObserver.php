<?php

namespace App\Observers;

use App\Models\Series;
use Ramsey\Uuid\Uuid;

class SeriesObserver
{
    /**
     * Handle the series "created" event.
     *
     * @param  Series  $series
     * @return void
     */
    public function creating(Series $series): void
    {
        $series->uuid = Uuid::uuid4();
        $series->goodreads_url = ($series->goodreads_url === null ? '' : $series->goodreads_url);
    }
}
