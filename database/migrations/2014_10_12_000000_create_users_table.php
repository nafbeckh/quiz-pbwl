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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email', 50)->unique();
            $table->string('password');
            $table->string('nama', 100);
            $table->text('alamat');
            $table->string('no_hp', 25);
            $table->string('kode_pos', 5);
            $table->tinyInteger('role');
            $table->enum('status', ['Aktif', 'Tidak Aktif'])->dafault('Aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
