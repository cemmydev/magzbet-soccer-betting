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
        Schema::create('bet_subscription_plan', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('bet_id');
            $table->foreignId('subscription_plan_id');

            $table->foreign('subscription_plan_id')->references('id')->on('subscription_plans');
            $table->foreign('bet_id')->references('id')->on('bets');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bet_subscription_plan');
    }
};
