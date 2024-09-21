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
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // ID (Primary Key)
            $table->string('product_name', 150); // Nama produk (NotNull)
            $table->string('category', 100); // Kategori (NotNull)
            $table->integer('price'); // Harga (NotNull)
            $table->float('discount')->nullable(); // Diskon (Null)
            $table->timestamps(); // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
