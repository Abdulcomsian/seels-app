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
        Schema::create('email_type', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('account_detail_id');
            $table->string('type'); 
            $table->timestamps();

           $table->foreign('account_detail_id')->references('id')->on('account_details')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('email_type');
    }
};
