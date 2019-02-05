<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_news', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('sponsor_id');
            $table->string('business_post_title');
            $table->longText('business_post_content')->nullable();
            $table->longText('business_post_image')->nullable();
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
        Schema::dropIfExists('business_news');
    }
}
