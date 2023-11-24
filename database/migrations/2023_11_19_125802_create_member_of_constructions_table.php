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
        Schema::create('member_of_constructions', function (Blueprint $table) {
            $table->id();
            $table->string('user');
            $table->foreignId('constructionId')->references('id')->on('constructions');
            // $table->string('constructionId');
            $table->string('member');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_of_constructions');
    }
};
