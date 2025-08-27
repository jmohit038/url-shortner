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
        Schema::dropIfExists('short_urls');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('short_urls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('user_id');
            $table->string('original_url');
            $table->string('short_code')->unique();
            $table->timestamps();
        });
    }
};
