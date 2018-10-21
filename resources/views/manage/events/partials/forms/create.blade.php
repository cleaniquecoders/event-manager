@hidden([
	'id' => 'id',
	'name' => 'id',
	'value' => ''
])

@input([
	'label' => 'Event Name',
])

@textarea([
	'label' => 'Event Description',
])

<div class="row">
	<div class="col-6">
		@input([
			'label' => 'Date',
			'type' => 'date'
		])
	</div>
	<div class="col-6">
		@input([
			'label' => 'Time',
			'type' => 'time',
			'min' => '9:00',
			'max' => '18:00'
		])
	</div>
</div>

<div class="row">
	<div class="col-6">
		@input([
			'label' => 'Fee (MYR)',
			'placeholder' => '100.00',
			'min' => 100
		])
	</div>
	<div class="col-6">
		@input([
			'label' => 'Payment URL',
			'placeholder' => 'Link to Payment'
		])
	</div>
</div>
