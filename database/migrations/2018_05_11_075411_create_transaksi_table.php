<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tanggal');
            $table->double('last')->nullable();
            $table->double('in')->nullable();
            $table->double('out')->nullable();
            $table->double('saldo')->nullable();
            $table->integer('sppd_id')->unsigned();
            $table->foreign('sppd_id')->references('id')->on('sppd');
            $table->integer('anggaran_id')->unsigned();
            $table->foreign('anggaran_id')->references('id')->on('anggaran');
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
        Schema::dropIfExists('transaksi');
    }
}
