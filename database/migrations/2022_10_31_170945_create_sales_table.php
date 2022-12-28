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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('product_code');
            $table->string('color');
            $table->integer('amount');
            $table->float('discount');
            $table->string('type')->default('user_order');
            $table->float('sold_price');
            $table->string('company');
            $table->float('purchased_price');
            $table->foreignId('product_id')->nullOnDelete();
            $table->foreignId('category_id')->nullOnDelete();
            $table->foreignId('order_id')->constrained('orders','id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
};
