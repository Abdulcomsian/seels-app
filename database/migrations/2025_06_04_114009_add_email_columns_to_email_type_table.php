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
        Schema::table('email_type', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->string('email_email')->nullable();
            $table->string('email_password')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('email_type', function (Blueprint $table) {
            $table->dropColumn(['email_email', 'email_password']);
        });
    }
};
