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
            // $table->index('user_id');
            $table->foreignUuid('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->index('perumahan_id');
            $table->foreignUuid('perumahan_id')->references('id')->on('perumahans')->onDelete('cascade');
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
