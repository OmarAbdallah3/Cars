<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('car_name');
            $table->string('car_brand');
            $table->string('transmission');
            $table->enum( 'car_condition' , ['Used' , 'New'] );
            $table->decimal('mileage')->nullable();
            $table->dateTime('registration');
            $table->string('color');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('phone');
            $table->string('address');
            // $table->unsignedBigInteger('model_id');
            // $table->foreign('model_id')->references('id')->on('car_models')->onDelete('cascade');
            // $table->unsignedBigInteger('dealer_id');
            // $table->foreign('dealer_id')->references('id')->on('dealers')->onDelete('cascade');
            // $table->unsignedBigInteger('price_id');
            // $table->foreign('price_id')->references('id')->on('prices')->onDelete('cascade');
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
        Schema::dropIfExists('cars');
    }
};
