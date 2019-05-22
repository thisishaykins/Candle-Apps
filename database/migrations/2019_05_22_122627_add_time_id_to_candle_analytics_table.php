<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTimeIdToCandleAnalyticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('candle_analytics', function (Blueprint $table) {
            // 1. Create new column
            // You probably want to make the new column nullable
            $table->integer('time_id')->unsigned()->nullable()->after('id');

            // 2. Create foreign key constraints
            $table->foreign('time_id')->references('id')->on('candle_analytics_time')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('candle_analytics', function (Blueprint $table) {
            // 1. Drop foreign key constraints
            // $table->dropForeign(['time_id']);

            // 2. Drop the column
            // $table->dropColumn('time_id');
        });
    }
}
