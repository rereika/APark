<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $table->renameColumn('email', 'user_name');
            $table->renameColumn('student_year', 'batch');

            $table->dropColumn('email_verified_at');

            $table->dropColumn('remember_token');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('user_name', 'email');

            $table->timestamp('email_verified_at')->nullable();

            $table->string('remember_token', 100)->nullable();
        });
    }
};
