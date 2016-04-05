<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermohonanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permohonan', function (Blueprint $table) {
            $table->increments('id')->unique()->unsigned();
            $table->integer('merchant_id')->unsigned();
            $table->enum('status', ['Diproses', 'Ditolak', 'Diterima']);
            $table->timestamps();//termasuk created_at yan merupakan tanggal permohonan
            $table->foreign('merchant_id')->references('id')->on('merchant');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('permohonan', function (Blueprint $table) {
            Schema::drop('permohonan');
        });
    }
}
