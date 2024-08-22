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
            // `name` カラムを削除
            if (Schema::hasColumn('users', 'name')) {
                $table->dropColumn('name');
            }

            // `google2fa_secret` カラムを削除
            if (Schema::hasColumn('users', 'google2fa_secret')) {
                $table->dropColumn('google2fa_secret');
            }

            // `google2fa_enabled` カラムを削除
            if (Schema::hasColumn('users', 'google2fa_enabled')) {
                $table->dropColumn('google2fa_enabled');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // `name` カラムを再追加
            if (!Schema::hasColumn('users', 'name')) {
                $table->string('name');
            }

            // `google2fa_secret` カラムを再追加
            if (!Schema::hasColumn('users', 'google2fa_secret')) {
                $table->string('google2fa_secret')->nullable();
            }

            // `google2fa_enabled` カラムを再追加
            if (!Schema::hasColumn('users', 'google2fa_enabled')) {
                $table->boolean('google2fa_enabled')->default(0);
            }
        });
    }
};
