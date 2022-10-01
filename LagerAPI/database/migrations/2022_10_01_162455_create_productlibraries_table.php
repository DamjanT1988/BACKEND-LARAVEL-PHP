<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('productlibraries', function (Blueprint $table) {
            $table->id();
            $table->string('product_title');
            $table->textarea('product_description');
            $table->double('price');
            $table->integer('amount_storage');
            $table->string('expiration_data');
            $table->
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
        Schema::dropIfExists('productlibraries');
    }
};
