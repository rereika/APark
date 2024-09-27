<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('users', function (Blueprint $table) {
        $table->string('why_engineer', 90)->nullable(); // なぜエンジニアになりたいのかの理由を保存する
    });
}

public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn('why_engineer');
    });
}

};
