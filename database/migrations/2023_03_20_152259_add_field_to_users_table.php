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

            $table->dropColumn('name');
            $table->dropColumn('password');
            $table->dropColumn('remember_token');
            $table->dropColumn('email_verified_at');
            $table->string('full_name');
            $table->string('phone');
            $table->boolean('role')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('users');
    }
};
