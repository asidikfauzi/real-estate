<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->foreignUuid('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignUuid('perumahan_id')->references('id')->on('perumahans')->onDelete('cascade');
            $table->foreignUuid('agent_id')->references('id')->on('agents')->onDelete('cascade');
            $table->string('name');
            $table->string('email');
            $table->string('no_telp');
            $table->string('tempo');
            $table->string('cicilan');
            $table->string('total_harga');
            $table->string('image');
            $table->string('status');
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
        Schema::dropIfExists('bookings');
    }
}
