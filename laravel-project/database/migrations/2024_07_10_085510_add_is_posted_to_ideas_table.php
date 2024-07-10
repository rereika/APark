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
        $table->boolean('is_posted')->default(false);
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
