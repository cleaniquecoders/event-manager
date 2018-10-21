<?php

namespace App\Http\Controllers\Api\Datatable\Manage;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Transformers\Datatable\EventTransformer;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function __invoke(Request $request)
    {
        return app('datatables')
            ->eloquent(Event::datatable())
            ->setTransformer(new EventTransformer())
            ->toJson();
    }
}
