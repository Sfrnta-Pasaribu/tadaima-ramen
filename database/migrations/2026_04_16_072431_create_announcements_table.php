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
            Schema::create('announcements', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->text('content');
                $table->string('image')->nullable();
                $table->string('type', 50)->default('info'); 
                $table->boolean('is_active')->default(true);
                $table->timestamps();
                $table->foreignId('admin_id')->constrained('admin')->cascadeOnDelete();
            });
    }

    public function down(): void
    {
        Schema::dropIfExists('announcements');
    }
};