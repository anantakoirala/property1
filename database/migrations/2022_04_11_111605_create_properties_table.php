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
            $table->string('propertycategory',100)->nullable();
            $table->string('class_type',50)->nullable();
            $table->string('advertisement_type')->nullable();
            $table->string('commission')->nullable();
            $table->string('owner_info')->nullable();
            $table->string('property_status')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->integer('propertytype_id');
            $table->string('property_location')->nullable();
            $table->integer('urgency_id')->nullable();
            $table->string('country')->nullable();
            $table->string('zone',100)->nullable();
            $table->string('district',100)->nullable();
            $table->string('town',100)->nullable();
            $table->string('place')->nullable();
            $table->string('street')->nullable();
            $table->string('vdc_np_mnp')->nullable();
            $table->string('ward_no',100)->nullable();
            $table->string('location',100)->nullable();
            $table->string('lat',100)->nullable();
            $table->string('lng',100)->nullable();
            $table->string('completion_year',50)->nullable();
            $table->string('url')->nullable();
            $table->string('availability_from')->nullable();
            $table->string('total_price')->nullable();
            $table->string('anna_price')->nullable();
            $table->string('sqft_price')->nullable();
            $table->string('advance')->nullable();
            $table->string('min_amount')->nullable();
            $table->string('max_amount')->nullable();
            $table->string('rent_per_month')->nullable();
            $table->string('min_lease')->nullable();
            $table->string('min_deposit')->nullable();
            $table->string('broker_response')->nullable();
            $table->text('property_highlights')->nullable();
            $table->text('property_description')->nullable();
            $table->text('other_description')->nullable();
            $table->string('company_address')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_phone')->nullable();
            $table->string('kitchens')->nullable();
            $table->string('floors')->nullable();
            $table->string('bedrooms')->nullable();
            $table->string('bathrooms')->nullable();
            $table->string('shutters')->nullable();
            $table->string('living_room')->nullable();
            $table->string('room_per_floor')->nullable();
            $table->string('parking')->nullable();
            $table->string('garage')->nullable();
            $table->string('boundry')->nullable();
            $table->string('size_of_pillars')->nullable();
            $table->string('no_of_pillars')->nullable();
            $table->string('source_of_waters')->nullable();
            $table->string('capacity_of_water_tank')->nullable();
            $table->string('main_road_width')->nullable();
            $table->string('side_road_width')->nullable();
            $table->string('road_wide_facing_the_land')->nullable();
            $table->string('mohoda_facing_the_land')->nullable();
            $table->string('status_of_road')->nullable();
            $table->string('land_perimeter')->nullable();
            $table->string('land_area_in_ropani_lal')->nullable();
            $table->string('land_area_in_sqft_lal')->nullable();
            $table->string('land_area_in_meters_lal')->nullable();
            $table->string('land_area_in_ropani_mes')->nullable();
            $table->string('land_area_in_sqft_mes')->nullable();
            $table->string('land_area_in_meters_mes')->nullable();
            $table->string('geometry_of_land')->nullable();
            $table->text('apartment_detail')->nullable();
            $table->string('elevation')->nullable();
            $table->string('finance_bank_name')->nullable();
            $table->string('loan_amount')->nullable();
            $table->string('seo')->nullable();
            $table->string('feature_image')->nullable();
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
