<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToChitietgiohangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('chitietgiohang', function (Blueprint $table) {
            $table->foreign(['masp'], 'chitietgiohang_ibfk_2')->references(['masp'])->on('sanpham')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['magiohang'], 'chitietgiohang_ibfk_1')->references(['magiohang'])->on('giohang')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('chitietgiohang', function (Blueprint $table) {
            $table->dropForeign('chitietgiohang_ibfk_2');
            $table->dropForeign('chitietgiohang_ibfk_1');
        });
    }
}
