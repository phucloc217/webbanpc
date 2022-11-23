<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanpham', function (Blueprint $table) {
            $table->integer('masp')->primary();
            $table->string('tensp', 50);
            $table->integer('gia');
            $table->text('mota')->nullable();
            $table->string('anh')->default('default.img');
            $table->integer('madanhmuc')->index('madanhmuc');
            $table->string('manhinh', 50)->nullable();
            $table->string('cpu', 50)->nullable();
            $table->string('ram', 50)->nullable();
            $table->string('ocung', 50)->nullable();
            $table->string('card', 50)->nullable();
            $table->string('cam', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sanpham');
    }
}
