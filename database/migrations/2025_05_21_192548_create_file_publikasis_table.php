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
        Schema::create('file_publikasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('publikasi_id')->constrained('publikasi')->onDelete('cascade');
            $table->string('file_path');
            $table->string('nama_file');
            $table->string('tipe');
            $table->string('size');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('file_publikasis');
    }
};
