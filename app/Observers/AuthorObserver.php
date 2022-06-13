<?php

namespace App\Observers;

use App\Models\Author;
use Ramsey\Uuid\Uuid;

class AuthorObserver
{
    /**
     * Handle the author "created" event.
     *
     * @param  Author  $author
     * @return void
     */
    public function creating(Author $author): void
    {
        $author->uuid = Uuid::uuid4();
    }
}
