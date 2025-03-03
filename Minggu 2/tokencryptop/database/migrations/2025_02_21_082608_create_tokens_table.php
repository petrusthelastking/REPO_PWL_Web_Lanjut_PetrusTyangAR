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
         // Membuat tabel 'tasks'
        Schema::create('tokens', function (Blueprint $table) {
            
            // Kolom ID sebagai primary key (unik dan auto-increment)
            $table->id();

            // Kolom untuk menyimpan nama token (contoh: Bitcoin, Ethereum)
            $table->string('name'); 

            // Kolom untuk menyimpan harga token dengan format desimal (total 8 digit, 2 digit desimal)
            $table->decimal('price', 8, 2);

            // Kolom untuk menyimpan jumlah token yang tersedia
            $table->integer('quantity'); 

            // Kolom untuk menyimpan deskripsi token
            $table->text('description')->nullable(); 

            // Kolom untuk menyimpan waktu pembuatan dan pembaruan data (created_at dan updated_at)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tokens');
    }
};
