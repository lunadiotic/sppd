<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengeluaranDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengeluaran_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uraian');
            $table->string('satuan')->nullable;
            $table->integer('qty');
            $table->double('biaya');
            $table->double('total');
            $table->date('tanggal');
            $table->integer('pengeluaran_id')->unsigned();
            $table->foreign('pengeluaran_id')->references('id')->on('pengeluaran');
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
        Schema::dropIfExists('pengeluaran_detail');
    }
}
