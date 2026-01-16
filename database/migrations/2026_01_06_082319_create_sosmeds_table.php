<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sosmeds', function (Blueprint $table) {
            $table->id(); // HANYA SATU KALI
            $table->string('nama_layanan');
            $table->decimal('harga', 10, 2);
            $table->text('deskripsi')->nullable();
            $table->string('gambar')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sosmeds');
    }
};