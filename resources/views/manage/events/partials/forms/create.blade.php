@hidden([
	'id' => 'id',
	'name' => 'id',
	'value' => ''
])

@input([
	'label' => 'Name',
])

@textarea([
	'label' => 'Description',
])

@textarea([
	'label' => 'Venue',
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
			'id' => 'fee',
			'name' => 'fee',
			'label' => 'Fee (MYR)',
			'placeholder' => '100.00',
			'min' => 100
		])
	</div>
	<div class="col-6">
		@input([
			'id' => 'payment_url',
			'name' => 'payment_url',
			'label' => 'Payment URL',
			'placeholder' => 'Link to Payment'
		])
	</div>
</div>
