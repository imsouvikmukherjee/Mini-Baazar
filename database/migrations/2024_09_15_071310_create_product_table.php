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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('product_title');
            $table->string('short_description');
            $table->text('long_description');
            $table->string('product_type');
            $table->string('meta_title')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->unsignedBigInteger('category');
            $table->foreign('category')->references('id')->on('mcategories')->onDelete('cascade');
            $table->unsignedBigInteger('sub_category');
            $table->foreign('sub_category')->references('id')->on('scategories')->onDelete('cascade');
            $table->unsignedBigInteger('sub_sub_category');
            $table->foreign('sub_sub_category')->references('id')->on('sscategories')->onDelete('cascade');
            $table->unsignedBigInteger('manufacturer');
            $table->foreign('manufacturer')->references('id')->on('manufacturers')->onDelete('cascade');
            $table->string('model');
            $table->string('sku');
            $table->unsignedBigInteger('tax_class');
            $table->foreign('tax_class')->references('id')->on('countries')->onDelete('cascade');
            $table->decimal('gst', 5, 2);
            $table->string('hsn_code');
            $table->string('length');
            $table->string('width');
            $table->string('height');
            $table->date('available_date');
            $table->string('weight_class');
            $table->string('weight');
            $table->string('product_status');
            $table->integer('sort_product');
            $table->integer('maximum_order');
            $table->string('payment_type');
            $table->string('product_return');
            $table->boolean('featured_product')->default(0);
            $table->boolean('popular_product')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
