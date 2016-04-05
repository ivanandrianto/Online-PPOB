<?php

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
            $table->increments('id')->unique()->unsigned();
            $table->integer('merchant_id')->unsigned();
            $table->integer('item_id')->unsigned();
            $table->integer('harga');
            $table->timestamps();//termasuk waktu transaksi (created_at)
            $table->foreign('merchant_id')->references('id')->on('merchant');
            $table->foreign('item_id')->references('id')->on('item');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transaksi', function (Blueprint $table) {
            Schema::drop('transaksi');
        });
    }
}
