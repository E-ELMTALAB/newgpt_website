<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('short_description', 255)->nullable();
            $table->longText('description')->nullable();
            $table->decimal('price', 12, 0);
            $table->decimal('compare_price', 12, 0)->nullable();
            $table->boolean('is_active')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->string('badge_text')->nullable();
            $table->string('featured_image')->nullable();
            $table->json('gallery')->nullable();
            $table->text('delivery_notes')->nullable();
            $table->text('guarantee_notes')->nullable();
            $table->string('seo_title')->nullable();
            $table->string('seo_description', 320)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
