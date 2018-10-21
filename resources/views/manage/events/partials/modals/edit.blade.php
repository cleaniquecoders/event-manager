@component('components.modals.base', [
    'id' => 'edit-event-modal',
    'tooltip' => __('Create New Event'),
    'modal_title' => __('Create New Event'),
    ])
    @slot('modal_body')
        {{ html()->form('POST', '#')->id('edit-event-form')->open() }}
            @method('PUT')
            @include('manage.events.partials.forms.create')
        {{ html()->form()->close() }}
    @endslot
    @slot('modal_footer')
        <button class="btn btn-success edit-form-btn">{{ __('Update') }}</button> 
    @endslot
@endcomponent
