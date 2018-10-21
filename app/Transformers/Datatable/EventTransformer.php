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
            'date'        => $event->date->format('l, jS F Y'),
            'time'        => date_format(
                \DateTime::createFromFormat('H:i:s', $event->time), 
                'g:i A'
            ),
        ];
    }
}
