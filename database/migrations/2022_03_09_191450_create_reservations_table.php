<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name')->nullable();
            $table->string('mobile')->nullable();
            $table->date('start')->nullable();
            $table->date('end')->nullable();
            $table->string('city')->nullable();
            $table->string('from')->nullable();
//
            $table->string('dress_name')->nullable();
            $table->string('dress_code')->nullable();
            $table->string('dress_price')->nullable();
            $table->string('dress_color')->nullable();

            $table->string('dress_color_acc')->nullable();
            $table->string('dress_price_acc')->nullable();
            $table->string('dress_name_acc')->nullable();
//
            $table->string('party_name')->nullable();
            $table->string('party_code')->nullable();
            $table->string('party_price')->nullable();
            $table->string('party_color')->nullable();

            $table->string('party_color_acc')->nullable();
            $table->string('party_price_acc')->nullable();
            $table->string('party_name_acc')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
