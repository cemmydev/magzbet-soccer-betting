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
            $table->date('date');
            $table->string('description');
            $table->string('pick');
            $table->string('image');
            $table->foreignId('subscription_plan_id');
            $table->float('odds');
            $table->float('stake');
            $table->float('gain');
            $table->float('profit');

            $table->foreign('subscription_plan_id')->references('id')->on('subscription_plans')->onDelete('cascade');
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
