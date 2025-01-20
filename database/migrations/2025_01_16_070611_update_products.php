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
        // Cập nhật bảng products
        Schema::table('products', function (Blueprint $table) {
            $table->integer('product_price')->change();  // Chuyển kiểu dữ liệu thành integer
        });

        // Cập nhật bảng discounts
        Schema::table('discounts', function (Blueprint $table) {
            $table->integer('discount_price')->nullable()->change();  // Chuyển kiểu dữ liệu thành integer
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->decimal('product_price', 8, 2)->change();  // Quay lại kiểu decimal
        });

        // Quay lại bảng discounts
        Schema::table('discounts', function (Blueprint $table) {
            $table->decimal('discount_price', 8, 2)->nullable()->change();  // Quay lại kiểu decimal
        });
    }
};
