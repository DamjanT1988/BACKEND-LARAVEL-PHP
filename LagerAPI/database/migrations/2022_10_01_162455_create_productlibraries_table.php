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
            //skapa fält för databas.
            $table->string('product_title');
            $table->varchar('ean_number');
            $table->text('product_description')->nullable();
            $table->double('price')->nullable();
            $table->integer('amount_storage')->nullable();
            $table->string('expiration_date')->nullable();
            $table->string('image_file_path')->nullable();
            $table->string('image_alt')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('productlibraries');
    }
};
