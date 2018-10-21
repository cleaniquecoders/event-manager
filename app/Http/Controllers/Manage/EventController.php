<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Models\User;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('manage.events.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.events.create');
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
        $user = User::findByHashSlug($id);

        return view('manage.events.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findByHashSlug($id);

        return view('manage.events.edit');
    }
}
