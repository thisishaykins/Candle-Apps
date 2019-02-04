<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sp_news', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('sponsor_id');
            $table->string('title');
            $table->longText('post_content')->nullable();
            $table->longText('bg_image')->nullable();
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
        Schema::dropIfExists('sp_news');
    }
}
