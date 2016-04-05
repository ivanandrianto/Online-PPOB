<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJenisItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_item', function (Blueprint $table) {
            $table->increments('id')->unique()->unsigned();
            $table->string('jenis',50);
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
        Schema::table('jenis_item', function (Blueprint $table) {
            Schema::drop('jenis_item');
        });
    }
}
