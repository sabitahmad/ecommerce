<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('attribute_value_variant', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\AttributeValue::class);
            $table->foreignIdFor(\App\Models\Variant::class);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('attribute_value_variant');
    }
};
