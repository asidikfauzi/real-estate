<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerumahansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perumahans', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('image');
            $table->string('lebar');
            $table->string('panjang');
            $table->integer('kamar');
            $table->integer('kamar_mandi');
            $table->integer('garasi');
            $table->longText('alamat');
            $table->string('kode_pos');
            $table->string('harga');
            $table->longText('keterangan');
            $table->boolean('status');
            $table->boolean('deleted');
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
        Schema::dropIfExists('perumahans');
    }
}
