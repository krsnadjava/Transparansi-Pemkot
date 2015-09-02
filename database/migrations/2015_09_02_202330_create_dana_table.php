<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDanaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dana', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode')->nullable();
            $table->string('uraian')->nullable();
            $table->bigInteger('nilai')->default(0);
            $table->integer('tahun')->default(0)->unsigned();
            $table->integer('level')->default(1)->unsigned();
            $table->integer('lembaga_id')->nullable();
            $table->integer('dana_id')->nullable();
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
        Schema::drop('dana');
    }
}
