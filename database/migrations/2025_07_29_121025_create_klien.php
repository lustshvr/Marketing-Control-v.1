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
        Schema::create('klien', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('alamat');
            $table->string('no_hp');
            $table->string('narahubung');
            $table->enum('jenjang',['SD','SMP','SMA','SMK','Kursus','Lain'])->default('SD');
            $table->integer('jumlah_siswa');
            $table->text('catatan');
            $table->date('tgl_mou');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('klien');
    }
};
