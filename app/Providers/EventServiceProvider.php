<?php

namespace App\Providers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Series;
use App\Models\Book\{
    BookGenre};
use App\Models\Platform;
use App\Observers\{
    AuthorObserver,
    BookObserver,
    SeriesObserver,
    PlatformObserver};
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    protected $observers = [
        Book::class => [BookObserver::class],
        Series::class => [SeriesObserver::class],
        Author::class => [AuthorObserver::class],
        //BookGenre::class => [BookGenreObserver::class],
        Platform::class => [PlatformObserver::class]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

}
