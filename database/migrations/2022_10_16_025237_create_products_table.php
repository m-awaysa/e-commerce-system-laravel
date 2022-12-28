<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->OnDelete('cascade');
            $table->timestamps();
            $table->string('name');
            $table->float('price');
            $table->string('company');
            $table->string('description');
            $table->float('discount');
            $table->integer('amount');
            $table->boolean('visibility');
            $table->integer('click');
            $table->string('image');
            $table->string('color');
            $table->string('product_code');
            $table->float('purchased_price');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
