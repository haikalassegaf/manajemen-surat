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
        Schema::create('surat_masuk', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_surat_masuk');
            $table->string('no_surat')->unique();
            $table->string('jenis');
            $table->string('perihal');
            $table->string('penerima');
            $table->string('dari');
            $table->string('tertuju');
            $table->date('tgl_pembuatan');
            $table->integer('status');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_masuk');
    }
};
