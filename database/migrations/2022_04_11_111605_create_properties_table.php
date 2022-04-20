<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->integer('purpose_id');
            $table->string('name')->nullable();
            $table->integer('propertycategory_id');
            $table->integer('propertytype_id');
            $table->string('property_location')->nullable();
            $table->string('country')->nullable();
            $table->string('zone')->nullable();
            $table->string('district')->nullable();
            $table->string('town')->nullable();
            $table->string('place')->nullable();
            $table->string('street')->nullable();
            $table->string('vdc_np_mnp')->nullable();
            $table->string('ward_no')->nullable();
            $table->string('location')->nullable();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
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
        Schema::dropIfExists('properties');
    }
}
