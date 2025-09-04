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
        Schema::create('notifikasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tagihan_id')->constrained('tagihan_klien')->onDelete('cascade');
            $table->enum('saluran',['Email','WA','SMS'])->default('Email');
            $table->text('isi_pesan');
            $table->enum('status',['Antri','Terkirim','Gagal'])->default('Antri');
            $table->datetime('terkirim_pada')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifikasi');
    }
};
