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
        Schema::create('aktivitas_prospek', function (Blueprint $table) {
            $table->id();
            $table->foreignId('calon_id')->constrained('calon_client')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->date('tgl_aktivitas');
            $table->enum('jenis',['undangan','proposal','kunjungan','webinar','call']);
            $table->enum('hasil',['positif','followup','negatif'])->default('followup');
            $table->text('catatan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aktivitas_prospek');
    }
};
