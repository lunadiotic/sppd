<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuratPerintahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_perintah', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomor');
            $table->text('uraian');
            $table->date('tanggal');
            $table->integer('pegawai_id');
            $table->foreign('pegawai_id')->references('id')->on('pegawai');
            $table->boolean('status');  
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
        Schema::dropIfExists('surat_perintah');
    }
}
