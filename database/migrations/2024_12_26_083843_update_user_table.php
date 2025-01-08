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
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone');
            $table->string('country')->nullable();
            $table->integer('type')->nullable();
            $table->integer('status')->nullable();
            $table->integer('role_id')->nullable();
            $table->string('address')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('phone');
            $table->dropColumn('country');
            $table->dropColumn('type');
            $table->dropColumn('status');
            $table->dropColumn('role_id');
            $table->dropColumn('address');
        });
    }
};
