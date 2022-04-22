<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->index()->constrained()->cascadeOnDelete();
                $table->string('dentist');
                $table->string('type_of_appointment');
                $table->string('date_of_appointment');
                $table->time('time_of_appointment');
                $table->dateTime('created_at');
                $table->dateTime('updated_at');

                $table->unique(['dentist', 'type_of_appointment', 'date_of_appointment', 'time_of_appointment'], 'uniqueBooking');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
};
