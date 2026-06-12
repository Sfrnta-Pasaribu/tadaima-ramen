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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('name');           // Nama Ramen
            $table->integer('price');         // Harga Asli
            $table->integer('harga_diskon')->nullable(); // Harga Promo/Diskon (Bisa kosong)
            $table->text('description');      // Penjelasan singkat menu
            $table->string('category');       // Kolom kategori
            $table->string('image')->nullable(); // Link gambar
            $table->timestamps();             // Waktu dibuat/diubah
            $table->foreignId('admin_id')->constrained('admin')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};