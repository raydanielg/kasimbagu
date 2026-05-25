<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('inquiries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('service')->nullable();
            $table->string('destination')->nullable();
            $table->string('subject')->nullable();
            $table->text('message');
            $table->enum('status', ['pending', 'read', 'replied'])->default('pending');
            $table->string('source')->default('main_website');
            $table->string('ip_address')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('inquiries'); }
};
