<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtPinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('at_pins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('location_id');
            $table->bigInteger('network_id');
            $table->bigInteger('sponsor_id');
            $table->longText('sponsor_promo_image')->nullable();
            $table->longText('pin_code');
            $table->string('pin_code_char');
            $table->boolean('is_active');
            $table->date('show_at');
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
        Schema::dropIfExists('at_pins');
    }
}
