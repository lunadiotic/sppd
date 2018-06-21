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
            $table->integer('pengeluaran_id')->unsigned();
            $table->foreign('pengeluaran_id')->references('id')->on('pengeluaran')->onDelete('cascade');
            $table->integer('biaya_id')->unsigned();
            $table->foreign('biaya_id')->references('id')->on('pengeluaran');
            $table->string('uraian');
            $table->integer('qty')->default(1);
            $table->string('satuan')->nullable();
            $table->double('harga');
            $table->double('total');
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
