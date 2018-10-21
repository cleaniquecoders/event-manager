<?php

namespace App\Http\Controllers;

use App\Models\Event;

class WelcomeController extends Controller
{
    public function __invoke()
    {
    	$events = Event::details()->isPublished()->get();
        return view('welcome', compact('events'));
    }
}
