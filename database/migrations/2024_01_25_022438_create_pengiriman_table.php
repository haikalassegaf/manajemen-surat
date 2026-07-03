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
        Schema::create('pengiriman', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_pengiriman');
            $table->string('no_surat')->unique();
            $table->string('jenis');
            $table->string('perihal');
            $table->string('dari');
            $table->string('tertuju');
            $table->string('jenis_pengiriman');
            $table->string('penerima');
            $table->string('ekspedisi');
            $table->string('status');
            $table->string('bukti_foto');
            $table->string('pengirim');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengiriman');
    }
};