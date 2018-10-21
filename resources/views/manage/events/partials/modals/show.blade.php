@component('components.modals.base', [
    'id' => 'view-event-modal',
    'modal_title' => 'Event Details',
    ])
    @slot('modal_body')
        @include('components.table', ['table_id' => 'event-details'])
    @endslot
    @slot('modal_footer')
        <a href="#" id="edit-event-link"
            @include('components.tooltip', ['tooltip' => 'Edit'])
            class="float-right btn btn-primary">
            <i class="fe fe-edit"></i> Edit
        </a>
    @endslot
@endcomponent