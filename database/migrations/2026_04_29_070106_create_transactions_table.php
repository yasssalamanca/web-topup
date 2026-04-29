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
        Schema::create('transactions', function (Blueprint $table) {
            $table->uuid('id')->primary(); // Keamanan tingkat dewa
            $table->string('reference_id')->unique()->index(); // ID Invoice buat user (INV-XXXX)
            $table->string('provider_reference')->nullable(); // ID dari server pusat (misal: Digiflazz)
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('product_id')->constrained()->restrictOnDelete();
            $table->foreignId('payment_method_id')->constrained()->restrictOnDelete();
            $table->string('target_id');
            $table->string('target_zone')->nullable();
            $table->enum('status', ['pending', 'processing', 'success', 'failed', 'expired'])->default('pending')->index();
            $table->integer('amount'); // Harga dasar
            $table->integer('fee'); // Biaya admin
            $table->integer('total_amount'); // Harga dasar + admin
            $table->string('payment_url')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
