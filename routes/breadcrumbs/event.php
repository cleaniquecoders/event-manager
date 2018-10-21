<?php

// Home > Manage Events
Breadcrumbs::register('manage.events.index', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push(__('Manage Events'), route('manage.events.index'));
});

// Home > Manage Events > Event Details
Breadcrumbs::register('manage.events.show', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('manage.events.index');
    $breadcrumbs->push(__('Event Details'), route('manage.events.show', $id));
});

// Home > Manage Events > Edit Event
Breadcrumbs::register('manage.events.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('manage.events.index');
    $breadcrumbs->push(__('Edit Event'), route('manage.events.edit', $id));
});
