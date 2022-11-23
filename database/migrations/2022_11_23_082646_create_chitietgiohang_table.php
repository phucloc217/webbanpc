<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChitietgiohangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietgiohang', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('magiohang')->index('magiohang');
            $table->integer('masp')->index('masp');
            $table->integer('soluong');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chitietgiohang');
    }
}
