<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CandleAnalyticsIndoorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candle_analytics_indoor', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('an_time_id');
            $table->bigInteger('an_location_id');
            $table->string('an_number_persons');
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
        Schema::dropIfExists('candle_analytics_indoor');
    }
}
