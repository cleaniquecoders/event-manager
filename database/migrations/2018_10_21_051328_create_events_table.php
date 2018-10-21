<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->user();
            $table->hashslug();
            $table->slug();
            $table->name();
            $table->description();
            $table->reference();
            $table->date('date');
            $table->time('time');
            $table->money('fee')->default(100.00);
            $table->string('payment_url')->nullable();
            $table->is('draft');
            $table->addAcceptance('published', 'users', false);
            $table->addAcceptance('cancelled', 'users', false);
            $table->standardTime();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
