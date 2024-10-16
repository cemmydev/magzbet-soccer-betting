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
        Schema::create('bets', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->boolean("hidden");
            $table->string('event', 255);
            $table->date('date')->nullable();
            $table->string('description')->nullable();
            $table->string('pick')->nullable();
            $table->string('image')->nullable();
            $table->float('odds')->nullable();
            $table->float('stake')->nullable();
            $table->float('gain')->nullable();
            $table->float('profit')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bets');
    }
};
