<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSppdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sppd', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomor');
            $table->string('perjalanan');
            $table->string('tempat_berangkat');
            $table->string('tempat_tujuan');
            $table->date('tanggal_berangkat');
            $table->date('tanggal_kembali');
            $table->text('pengikut')->nullable();
            $table->string('keterangan')->nullable();
            $table->integer('pegawai_id');
            $table->foreign('pegawai_id')->references('id')->on('pegawai');
            $table->integer('surat_perintah_id');
            $table->foreign('surat_perintah_id')->references('id')->on('pegawai');
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
        Schema::dropIfExists('sppd');
    }
}
