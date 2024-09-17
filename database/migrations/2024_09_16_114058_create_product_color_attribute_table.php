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
        Schema::create('product_color_attribute', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('attributeId');
            $table->foreign('attributeId')->references('id')->on('product_attribute')->onDelete('cascade');
            $table->string('label');
            $table->decimal('mrp', 8, 2);
            $table->decimal('price', 8, 2);
            $table->integer('quantity');
            $table->string('color');
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->string('image4')->nullable();
            $table->string('image5')->nullable();
            $table->string('image6')->nullable();
            $table->string('image7')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_color_attribute');
    }
};
