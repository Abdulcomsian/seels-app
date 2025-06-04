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
              $table->dropForeign(['account_detail_id']); // Only if a foreign key exists
                $table->dropColumn('account_detail_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('email_type', function (Blueprint $table) {
            //
        });
    }
};
