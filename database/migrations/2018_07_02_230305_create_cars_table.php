<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('model');
            $table->integer('chasis')->unique();
            $table->float('grade');
            $table->string('manuFactureyear');
            $table->string('purchasingprice');
            $table->tinyInteger('sold')->default(false);
            $table->float('sellingprice')->default(0);
            $table->float('profit')->default(0);
            $table->string('auctionhouse')->default("no");
            $table->string('aunctionHouseName')->nullable();
            $table->string('to')->nullable();
            $table->string('from')->nullable();
            $table->integer('expense')->defualt(0);
            $table->string('workshopname')->nullable();
            $table->integer('workshopexpense')->default(0);
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
        Schema::dropIfExists('cars');
    }
}
