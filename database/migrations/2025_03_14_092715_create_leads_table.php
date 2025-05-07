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
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('company')->nullable();
            $table->string('city')->nullable();
            $table->string('corporate_phone')->nullable();
            $table->string('employees')->nullable();
            $table->string('industry')->nullable();
            $table->string('website')->nullable();
            $table->string('company_linkedin_url')->nullable();
            $table->string('vv_straat')->nullable();
            $table->string('street')->nullable();
            $table->string('s15_data_source')->nullable();
            $table->string('snippet_3')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('title')->nullable();
            $table->string('email')->nullable();
            $table->string('person_linkedin_url')->nullable();
            $table->enum('status',[0,1])->default(0); // 0 means unchecked and 1 means checked
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
