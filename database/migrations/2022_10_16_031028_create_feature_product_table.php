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
        Schema::create('feature_product', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->foreignId('feature_id')->constrained()->onDelete('cascade');
            $table->string('feature_value');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_feature');
    }
};
