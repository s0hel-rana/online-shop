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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->nullable();
            $table->longText('description')->nullable();
            $table->double('price', 10, 2);
            $table->double('compare_price', 10, 2)->nullable();
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->foreignId('sub_category_id')->constrained('sub_categories')->onDelete('cascade');
            $table->foreignId('brand_id')->constrained('brands')->onDelete('cascade');
            $table->enum('is_featured', ['yes', 'no'])->default('no');
            $table->string('sku');
            $table->string('barcode')->nullable();
            $table->enum('track_qty', ['yes', 'no'])->default('yes');
            $table->integer('qty')->default(0);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
