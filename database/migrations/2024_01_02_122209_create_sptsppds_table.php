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
        Schema::create('sptsppds', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('no_urut');
            $table->string('pengirim');
            $table->string('alamat_pengirim');
            $table->string('jenis');
            $table->date('tanggal_masuk');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sptsppds');
    }
};
