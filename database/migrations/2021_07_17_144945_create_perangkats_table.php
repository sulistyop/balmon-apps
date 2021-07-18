<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerangkatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perangkats', function (Blueprint $table) {
            $table->id();
            $table->integer('id_perangkat')->unique();
            $table->string('no_seri')->nullable();
            $table->string('nama_perangkat')->nullable();
            $table->string('stok')->nullable();
            $table->string('tahun_pengadaan')->nullable();
            $table->string('type_perangkat')->nullable();
            $table->foreignId('pegawai_id');
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
        Schema::dropIfExists('perangkats');
    }
}
