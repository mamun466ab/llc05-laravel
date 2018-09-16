<?php

namespace App\Providers;

use App\Events\PostCreated;
use App\Events\PostDeleted;
use App\Events\PostUpdated;
use App\Listeners\PostCacheListener;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        PostCreated::class => [
            PostCacheListener::class,
        ],
        PostUpdated::class => [
            PostCacheListener::class,
        ],
        PostDeleted::class => [
            PostCacheListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
