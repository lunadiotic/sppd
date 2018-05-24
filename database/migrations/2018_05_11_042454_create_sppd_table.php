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
            $table->string('nomor')->nullable();
            $table->string('perjalanan')->nullable();
            $table->string('tempat_berangkat')->nullable();
            $table->string('tempat_tujuan')->nullable();
            $table->date('tanggal_berangkat')->nullable();
            $table->date('tanggal_kembali')->nullable();
            $table->text('pengikut')->nullable();
            $table->string('keterangan')->nullable();
            $table->integer('pegawai_id');
            $table->foreign('pegawai_id')->references('id')->on('pegawai');
            $table->integer('surat_perintah_id');
            $table->foreign('surat_perintah_id')->references('id')->on('pegawai');
            $table->boolean('status')->default(0);
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
