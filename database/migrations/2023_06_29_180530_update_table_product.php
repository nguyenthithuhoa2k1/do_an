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
        Schema::table('product', function (Blueprint $table) {
            $table->integer('id_category')->after('price');
            $table->integer('id_brand')->after('id_category');
            $table->tinyInteger('sale')->after('id_brand')->nullable();;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
