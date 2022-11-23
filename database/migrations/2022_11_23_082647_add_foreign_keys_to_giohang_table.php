<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToGiohangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('giohang', function (Blueprint $table) {
            $table->foreign(['makh'], 'giohang_ibfk_1')->references(['makh'])->on('khachhang')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('giohang', function (Blueprint $table) {
            $table->dropForeign('giohang_ibfk_1');
        });
    }
}
