<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->enum('category', ['travel', 'legal', 'research', 'registration', 'ict']);
            $table->string('icon')->default('bi-briefcase');
            $table->string('icon_color')->default('#004a99');
            $table->text('short_description');
            $table->longText('full_description')->nullable();
            $table->string('image_url')->nullable();
            $table->json('features')->nullable();
            $table->string('cta_text')->default('Get Started');
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('services'); }
};
