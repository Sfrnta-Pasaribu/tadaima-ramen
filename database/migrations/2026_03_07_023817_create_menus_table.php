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
        $table->string('name');         // Nama Ramen (contoh: Shio Ramen)
        $table->integer('price');       // Harga (contoh: 35000)
        $table->text('description');    // Penjelasan singkat menu
        $table->string('image')->nullable(); // Link gambar (opsional)
        $table->timestamps();           // Mencatat waktu dibuat/diubah
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
