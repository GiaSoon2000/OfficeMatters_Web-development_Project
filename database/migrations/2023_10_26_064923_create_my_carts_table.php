<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('my_carts', function (Blueprint $table) {
            $table->id();
            $table->string('productID');
            $table->integer('quantity');
            $table->string('userID');
            $table->time('dateAdd');
            $table->integer('orderID');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('my_carts');
    }
};
