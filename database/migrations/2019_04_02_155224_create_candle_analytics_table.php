<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandleAnalyticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candle_analytics', function (Blueprint $table) {
            $table->bigIncrements('an_id');
            $table->bigInteger('an_location_id');
            $table->string('an_number_cars');
            $table->longText('an_number_persons_car');
            $table->longText('an_soe_a');
            $table->longText('an_soe_b');
            $table->longText('an_soe_c');
            $table->longText('an_soe_d');
            $table->longText('an_soe_e');
            $table->longText('an_soe_f');
            $table->longText('an_gender_male');
            $table->longText('an_gender_female');
            $table->date('an_date_added')->nullable();
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
        Schema::dropIfExists('candle_analytics');
    }
}
