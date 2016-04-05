<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKeuntunganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keuntungan', function (Blueprint $table) {
            $table->date('tanggal');
            $table->integer('merchant_id')->unsigned();
            $table->bigInteger('jumlah');
            $table->foreign('merchant_id')->references('id')->on('merchant');
            $table->primary(array('tanggal', 'merchant_id'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('keuntungan', function (Blueprint $table) {
            Schema::drop('keuntungan');
        });
    }
}
