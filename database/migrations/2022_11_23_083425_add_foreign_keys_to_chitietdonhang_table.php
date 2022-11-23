<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToChitietdonhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('chitietdonhang', function (Blueprint $table) {
            $table->foreign(['masp'], 'chitietdonhang_ibfk_2')->references(['masp'])->on('sanpham')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['iddonhang'], 'chitietdonhang_ibfk_1')->references(['madh'])->on('donhang')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('chitietdonhang', function (Blueprint $table) {
            $table->dropForeign('chitietdonhang_ibfk_2');
            $table->dropForeign('chitietdonhang_ibfk_1');
        });
    }
}
