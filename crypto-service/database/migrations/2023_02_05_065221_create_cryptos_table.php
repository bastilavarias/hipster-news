<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCryptosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cryptos', function (Blueprint $table) {
            $table->id();
            $table->string('symbol')->nullable();
            $table->string('name')->nullable();
            $table->string('image')->nullable();
            $table->string('current_price')->nullable();
            $table->string('market_cap')->nullable();
            $table->integer('market_cap_rank')->nullable();
            $table->string('total_volume')->nullable();
            $table->string('high_24h')->nullable();
            $table->string('low_24h')->nullable();
            $table->string('price_change_24h')->nullable();
            $table->string('price_change_percentage_24h')->nullable();
            $table->string('market_cap_change_24h')->nullable();
            $table->string('market_cap_change_percentage_24h')->nullable();
            $table->string('circulating_supply')->nullable();
            $table->string('total_supply')->nullable();
            $table->string('max_supply')->nullable();
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
        Schema::dropIfExists('cryptos');
    }
}
