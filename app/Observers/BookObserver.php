<?php

namespace App\Observers;

use App\Models\Book;
use Ramsey\Uuid\Uuid;

class BookObserver
{
    /**
     * Handle the Book "created" event.
     *
     * @param  Book  $book
     * @return void
     */
    public function creating(Book $book): void
    {
        $book->uuid = Uuid::uuid4();
        $book->user_id = auth()->id();
    }
}
