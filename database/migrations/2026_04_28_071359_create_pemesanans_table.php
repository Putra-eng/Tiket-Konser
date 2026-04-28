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
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->id('id_pemesanan');

            $table->foreignId('id_pembeli')
                ->constrained('pembeli', 'id_pembeli')
                ->onDelete('cascade');

            $table->foreignId('id_tiket')
                ->constrained('tiket', 'id_tiket')
                ->onDelete('cascade');

            $table->integer('jumlah');
            $table->integer('total_harga');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanans');
    }
};
