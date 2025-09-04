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
        Schema::create('tagihan_klien', function (Blueprint $table) {
            $table->id();
            $table->foreignId('klien_id')->constrained('klien')->onDelete('cascade');
            $table->string('keterangan');
            $table->decimal('jumlah_tagihan', 12, 2);
            $table->date('jatuh_tempo');
            $table->decimal('jumlah_bayar', 12, 2);
            $table->date('dibayar_pada');
            $table->enum('status',['Belum','Sebagian','Lunas'])->default('Belum');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tagihan_klien');
    }
};
