<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nisn')->nullable()->unique();
            $table->string('kelas')->nullable();
            $table->enum('jurusan', ['lps','dkv','aphp','kuliner','rpl'])->nullable();
            $table->text('alamat')->nullable();
            $table->date('tanggal_lahir')->nullable(); // pakai date, bukan string
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
