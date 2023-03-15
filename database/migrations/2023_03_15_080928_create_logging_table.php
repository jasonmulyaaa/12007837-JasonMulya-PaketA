<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logging', function (Blueprint $table) {
            $table->id();
            $table->enum('table', ['masyarakat', 'pengaduan', 'petugas', 'tanggapan']);
            $table->string('nama');
            $table->string('username');
            $table->date('tgl_aksi');
            $table->enum('level', ['admin', 'petugas', 'masyarakat']);
            $table->enum('status', ['insert', 'update', 'delete']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logging');
    }
};
