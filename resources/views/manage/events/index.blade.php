@extends('layouts.admin')

@section('content')
	@include('manage.events.partials.styles')
	@include('manage.events.partials.scripts', [
		'table_id' => 'event-management',
		'primary_key' => 'hashslug',
		'routes' => [
			'show' => 'api.manage.events.show',
			'store' => 'api.manage.events.store',
			'update' => 'api.manage.events.update',
			'destroy' => 'api.manage.events.destroy',
		],
		'columns' => [
			'name' => __('table.name'), 
			'email' => __('table.email'), 
			'roles_to_string' => __('table.role'), 
			'roles' => __('table.role'), 
			'created_at' => __('table.created_at'),
			'updated_at' => __('table.updated_at')
		],
		'forms' => [
			'create' => 'event-form',
			'edit' => 'event-form',
		], 
		'disabled' => [
			'email'
		]
	])
	@include('manage.events.partials.modals.form')
	@include('manage.events.partials.modals.show')
	<div class="row justify-content-center">
		<div class="col">
			@component('components.card')
				@slot('card_title')
					@include('components.modals.button', [
						'modal_btn_classes' => 'create-action-btn float-right',
						'label' => __('New Event'),
						'icon' => 'fe fe-plus'
					])
				@endslot
				@slot('card_body')
					@component('components.datatable', 
						[
							'table_id' => 'event-management',
							'route_name' => 'api.datatable.manage.event',
							'columns' => [
								['data' => 'name', 'title' => __('table.name'), 'defaultContent' => '-'],
								['data' => 'datetime', 'title' => __('table.datetime'), 'defaultContent' => '-'],
								['data' => 'venue', 'title' => __('table.venue'), 'defaultContent' => '-'],
								['data' => null , 'name' => null, 'searchable' => false],
							],
							'headers' => [
								__('table.name'), __('table.datetime'), __('table.venue'), __('table.action')
							],
							'actions' => minify(view('components.actions')->render())
						]
					)
					@endcomponent
				@endslot
			@endcomponent
		</div>
	</div>
@endsection