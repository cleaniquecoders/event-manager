<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Observers
    |--------------------------------------------------------------------------
    |
    | This value is the list of models being observed by the observer class.
    | The observer will observe any events triggered by eloquent and of course,
    | to which event the observer want to listen to - created, creating, updating,
    | updated, deleting or deleted.
    |
     */

    \App\Observers\ReferenceObserver::class => [
        \App\Models\Event::class,
    ],
    \App\Observers\HashidsObserver::class => [
        \App\Models\Event::class,
        \App\Models\User::class,
        \App\Models\Subscription::class,
        \Spatie\MediaLibrary\Media::class,
    ],
];
