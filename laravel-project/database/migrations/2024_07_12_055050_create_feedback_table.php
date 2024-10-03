<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbackTable extends Migration
{
    public function up()
{
    Schema::create('feedback', function (Blueprint $table) {
        $table->id();
        $table->unsignedInteger('idea_id')->unique(); // 一意制約を追加
        $table->integer('fb_chart1');
        $table->integer('fb_chart2');
        $table->integer('fb_chart3');
        $table->integer('fb_chart4');
        $table->integer('fb_chart5');
        $table->text('comment1');
        $table->text('comment2');
        $table->text('comment3');
        $table->text('comment4');
        $table->text('comment5');
        $table->timestamps(); // created_atとupdated_atカラムを追加

        $table->foreign('idea_id')->references('id')->on('ideas')->onDelete('cascade');
    });
}


    public function down()
    {
        Schema::dropIfExists('feedback');
    }
}
