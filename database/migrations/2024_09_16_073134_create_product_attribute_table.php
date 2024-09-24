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
        Schema::create('product_attribute', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('productid');
            $table->foreign('productid')->references('id')->on('product')->onDelete('cascade');
            $table->string('label')->nullable();
            $table->string('color')->nullable();
            $table->decimal('mrp', 8, 2);
            $table->decimal('price', 8, 2);
            $table->integer('quantity');

            $table->text('images')->nullable();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_attribute');
    }
};
