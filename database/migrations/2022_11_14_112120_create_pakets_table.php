<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pakets', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->string('kategori')->nullable();
            $table->string('nama')->nullable();
            $table->longText('include')->nullable();
            $table->longText('exclude')->nullable();
            $table->bigInteger('harga')->nullable();
            $table->string('transportasi')->nullable();
            $table->string('hotel')->nullable();
            $table->date('tanggal')->nullable();
            $table->string('detail')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('pakets');
    }
}
