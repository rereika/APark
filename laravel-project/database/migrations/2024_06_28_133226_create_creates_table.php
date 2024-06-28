<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ideas', function (Blueprint $table) {
            $table->id();
            $table->integer('theme');
            $table->text('elevator1');
            $table->text('elevator2');
            $table->text('how');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ideas');
    }
};
