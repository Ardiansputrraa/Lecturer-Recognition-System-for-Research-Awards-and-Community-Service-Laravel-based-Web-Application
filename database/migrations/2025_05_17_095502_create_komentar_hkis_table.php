<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('komentar_hki', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hki_id')->constrained('hki')->onDelete('cascade');
            $table->text('komentar');
            $table->string('nama_lengkap');
            $table->string('foto_profile');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('komentar_hkis');
    }
};
