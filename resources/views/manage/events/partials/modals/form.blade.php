@component('components.modals.base', [
	'id' => 'event-modal',
	'tooltip' => __('Event'),
	'modal_title' => __('Event'),
	])
	@slot('modal_body')
	  	{{ html()->form('POST', '#')->id('event-form')->open() }}
			@method('POST')
			@include('manage.events.partials.forms.create')
		{{ html()->form()->close() }}
	@endslot
	@slot('modal_footer')
		<button class="btn btn-success form-btn">{{ __('Save') }}</button> 
	@endslot
@endcomponent
