<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesans', function (Blueprint $table) {
            $table->foreignUuid('user_from');
            $table->foreign('user_from')->references('id')->on('users')->onDelete('cascade');
            $table->foreignUuid('user_to');
            $table->foreign('user_to')->references('id')->on('users')->onDelete('cascade');
            $table->longtext('keterangan');
            $table->string('image')->nullable();
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
        Schema::dropIfExists('pesans');
    }
}
