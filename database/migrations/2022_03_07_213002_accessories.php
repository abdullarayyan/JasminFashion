<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Accessories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accessory', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('quantity')->nullable();
            $table->string('model')->nullable();
            $table->string('brand')->nullable();
            $table->boolean('status')->default(false);
            $table->string('code')->nullable();
            $table->string('color')->nullable();
            $table->string('price')->nullable();

            $table->string('img')->nullable();
            $table->string('file')->nullable();
            $table->string('description')->nullable();
            $table->boolean('sale')->default(false);

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
        Schema::dropIfExists('accessory');
    }
}
