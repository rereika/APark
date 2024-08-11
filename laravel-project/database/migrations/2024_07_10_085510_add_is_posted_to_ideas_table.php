<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('ideas', function (Blueprint $table) {
            // カラムが存在しない場合は追加する
            if (!Schema::hasColumn('ideas', 'is_posted')) {
                $table->tinyInteger('is_posted')->default(0);
            } else {
                // 既存のカラムがあれば変更する
                $table->tinyInteger('is_posted')->default(0)->change();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('ideas', function (Blueprint $table) {
            if (Schema::hasColumn('ideas', 'is_posted')) {
                $table->dropColumn('is_posted');
            }
        });
    }
};
