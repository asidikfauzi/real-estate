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
            $table->string('pondasi');
            $table->string('struktur');
            $table->string('atap');
            $table->string('dinding');
            $table->string('platon');
            $table->string('lantai');
            $table->string('kusen');
            $table->string('pintu');
            $table->string('sanitasi');
            $table->string('air');
            $table->string('listrik');
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
