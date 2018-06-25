<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengeluaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengeluaran', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomor');
            $table->string('sumber_dana');
            $table->double('nominal')->nullable();
            $table->string('terbilang')->nullable();;
            $table->string('keperluan');
            $table->string('belanja_jenis');
            $table->string('belanja_obyek');
            $table->string('belanja_rincian');
            $table->date('tanggal');
            $table->text('keterangan')->nullable();;
            $table->integer('sppd_id')->unsigned();
            $table->foreign('sppd_id')->references('id')->on('sppd');
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
        Schema::dropIfExists('pengeluaran');
    }
}
