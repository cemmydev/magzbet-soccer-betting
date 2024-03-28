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
        Schema::create('telegram_options', function (Blueprint $table) {
            $table->id();
            $table->string('message_title')->nullable();
            $table->text('message_description')->nullable();
            $table->string('message_link_to')->nullable();
            $table->string('message_link_text')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('telegram_options');
    }
};
