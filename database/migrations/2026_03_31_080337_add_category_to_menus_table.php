<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
        public function up()
    {
        Schema::table('menus', function (Blueprint $table) {
            // Kita letakkan kolom category setelah kolom price
            $table->string('category')->after('price')->default('Ramen'); 
        });
    }

    public function down()
    {
        Schema::table('menus', function (Blueprint $table) {
            $table->dropColumn('category');
        });
    }
};