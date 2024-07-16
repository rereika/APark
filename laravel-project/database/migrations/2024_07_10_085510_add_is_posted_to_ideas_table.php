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
        //0は保存も下書き保存もしない、1は下書き、2は投稿
        $table->tinyInteger('is_posted')->default(0)->change();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('ideas', function (Blueprint $table) {
            $table->dropColumn('is_posted');
        });
    }

};
