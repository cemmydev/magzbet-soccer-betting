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
        Schema::table('subscription_plan_user', function (Blueprint $table) {
            //
            $table->date('start_at');
            $table->date('expire_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('subscription_plan_user', function (Blueprint $table) {
            //
            $table->dropColumn('start_at')->nullable();
            $table->dropColumn('expire_at')->nullable();
        });
    }
};
