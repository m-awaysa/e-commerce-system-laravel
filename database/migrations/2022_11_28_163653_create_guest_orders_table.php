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
        Schema::create('guest_orders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->string('company_name');
            $table->integer('company_number');
            $table->integer('phone_number');
            $table->string('email');
            $table->integer('amount');
            $table->string('status');
            $table->string('note');
            $table->string('street');
            $table->string('city'); 
            $table->float('sold_price');
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guest_orders');
    }
};
