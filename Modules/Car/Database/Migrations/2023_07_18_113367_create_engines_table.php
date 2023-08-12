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
        Schema::create('engines', function (Blueprint $table) {
            $table->id();
            $table->string('engine_type'); 
            $table->string('engine_name'); 
            $table->string('engine_capacity'); 
            $table->integer('cylinder_num');
            $table->decimal('acceleration'); 
            $table->decimal('feul_capacity'); 
            $table->string('traction_system'); 
            $table->string('engine_location');
            $table->decimal('max_speed'); 
            $table->decimal('Horsepower');
            $table->decimal('torque');
            $table->decimal('avg_oil_consumption');
            $table->string('fuel_type'); 
            $table->integer('gears_num');  
            $table->string('internal_combustion_engine'); 
            $table->dateTime('creation_date');  
            $table->text('description'); 
            $table->unsignedBigInteger('car_id');
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade');
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
        Schema::dropIfExists('engines');
    }
};
