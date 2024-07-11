<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateColumnsNullableInIdeasTable extends Migration
{
    public function up()
    {
        Schema::table('ideas', function (Blueprint $table) {
            $table->string('elevator1')->nullable()->change();
            $table->string('elevator2')->nullable()->change();
            $table->text('how')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('ideas', function (Blueprint $table) {
            $table->string('elevator1')->change();
            $table->string('elevator2')->change();
            $table->text('how')->change();
        });
    }
}
