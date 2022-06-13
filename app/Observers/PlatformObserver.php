<?php

namespace App\Observers;

use App\Models\Platform;
use Ramsey\Uuid\Uuid;

class PlatformObserver
{
    /**
     * Handle the Platform "creating" event.
     *
     * @param  Platform  $platform
     * @return void
     */
    public function creating(Platform $platform): void
    {
        $platform->uuid = Uuid::uuid4();
    }
}
