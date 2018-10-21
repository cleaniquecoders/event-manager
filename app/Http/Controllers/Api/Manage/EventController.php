<?php

namespace App\Http\Controllers\Api\Manage;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'date'        => 'required|date',
            'time'        => 'required|date_format:H:i',
            'fee'         => 'required|min:100',
            'payment_url' => 'required|url',
        ]);
        $data = $request->only('name', 'description', 'date', 'time', 'fee', 'payment_url');

        user()->events()->create($data);

        return response()->api([], __('Event successfully stored.'), true, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param string $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::details()->findByHashSlug($id);

        return response()->api($event);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param string                   $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'date'        => 'required|date',
            'time'        => 'required|date_format:H:i',
            'fee'         => 'required|min:100',
            'payment_url' => 'required|url',
        ]);

        $data = $request->only('name', 'description', 'date', 'time', 'fee', 'payment_url');

        Event::hashslug($id)->update($data);

        return response()->api([], __('Event successfully updated.'), true, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::findByHashSlug($id);
        if ($event->is_published) {
            return response()->api([], __('You cannot delete published event!'), false, 401);
        }

        if ($event->has_subscribers) {
            return response()->api([], __('You cannot delete event with subscribers!'), false, 401);
        }

        $event->delete();

        return response()->api([], __('You have successfully delete an event.'));
    }
}
