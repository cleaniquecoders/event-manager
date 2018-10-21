<?php

namespace App\Transformers\Datatable;

use App\Models\Event;
use League\Fractal\TransformerAbstract;

class EventTransformer extends TransformerAbstract
{
    /**
     * @param \App\Models\Event $event
     *
     * @return array
     */
    public function transform(Event $event)
    {
        return [
            'hashslug'    => $event->hashslug,
            'name'        => $event->name,
            'description' => $event->description,
            'excerpt'     => str_limit($event->description, 100),
            'datetime'    => $event->date_time,
            'venue'       => $event->venue,
        ];
    }
}
