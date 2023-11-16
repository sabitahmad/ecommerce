<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->json('description')->nullable();
            $table->json('long_description');
            $table->decimal('regular_price')->nullable();
            $table->enum('type' , ['simple', 'variable'])->default('simple');
            $table->enum('status', ['active', 'inactive', 'draft'])->default('draft');
            $table->enum('discount_type', ['none', 'amount', 'percent'])->default('none');
            $table->float('discount_price')->nullable();
            $table->string('sku')->nullable();
            $table->integer('stock')->default(0);
            $table->json('tags')->nullable();
            $table->string('thumbnail');
            $table->json('product_images');
            $table->foreignId('category_id')->constrained('categories');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
