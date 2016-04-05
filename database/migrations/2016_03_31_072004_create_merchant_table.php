<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMerchantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchant', function (Blueprint $table) {
            $table->increments('id')->unique()->unsigned();
            $table->string('nama',50);
            $table->string('alamat',100);
            $table->string('telepon',20);
            $table->string('email',50)->unique();
            $table->enum('status', ['Diproses', 'Ditolak', 'Diterima']);
            $table->string('password');
            $table->rememberToken();
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
        Schema::table('merchant', function (Blueprint $table) {
            Schema::drop('merchant');
        });
    }
}
