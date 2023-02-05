<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->text('title')->nullable();
            $table->string('author')->nullable();
            $table->timestamp('published_date')->nullable();
            $table->string('published_date_precision')->nullable();
            $table->string('link')->nullable();
            $table->string('clean_url')->nullable();
            $table->text('excerpt')->nullable();
            $table->text('summary')->nullable();
            $table->text('rights')->nullable();
            $table->integer('rank')->nullable();
            $table->string('topic')->nullable();
            $table->string('country')->nullable();
            $table->string('language')->nullable();
            $table->string('authors')->nullable();
            $table->string('media')->nullable();
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
        Schema::dropIfExists('news');
    }
}
