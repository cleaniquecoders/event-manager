@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            @forelse ($events as $event)
                @card
                    @slot('card_body')
                        <div class="row">
                            <div class="col-4">
                                <h4>{{ $event->name }}</h4>
                                <span class="">
                                    @icon('fe fe-calendar') {{ $event->date_time }}
                                </span>
                                <br>
                                <span class="">
                                    @icon('fe fe-map-pin') {{ $event->venue }}
                                </span>
                                <br>
                                <span class="badge badge-primary">
                                    RM {{ $event->fee }}
                                </span>
                                <span class="badge badge-success">
                                    {{ $event->subscribers->count() }} subscriber(s)
                                </span>
                            </div>
                            <div class="col-8">
                                <p>
                                    {{ str_limit($event->description, 255) }}
                                </p>
                                @auth 
                                    <div class="float-right">
                                        <a href#" class="btn btn-default btn-sm border-primary">
                                            {{ __('Subscribe') }}
                                        </a>
                                    </div>
                                @else 
                                    <div class="btn-group float-right">
                                        <a href="{{ route('register') }}" class="btn btn-default btn-sm border-primary">
                                            {{ __('Register') }}
                                        </a>
                                        <a href="{{ route('login') }}" class="btn btn-success btn-sm border-success">
                                            {{ __('Login') }}
                                        </a>
                                    </div>
                                @endauth
                            </div>
                        </div>
                    @endslot
                @endcard
            @empty 
                <div class="alert alert-warning">
                    {{ __('Sorry, no new event at the moment.') }}
                </div>
            @endforelse
        </div>
    </div>
@endsection
