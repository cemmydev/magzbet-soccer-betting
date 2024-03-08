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
        Schema::create('subscription_plan_user', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('subscription_plan_id');
            $table->foreignId('user_id');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('subscription_plan_id')->references('id')->on('subscription_plans');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscription_plan_user');
    }
};
