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
        Schema::create('conversation', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('sender_id');

            $table->foreign('sender_id')
                ->references('id')->on('users')
                ->cascadeOnDelete()->cascadeOnUpdate();

            $table->string('banglish_conversation');
            $table->string('bangla_conversation');
            $table->string('english_conversation');

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conversation');
    }
};
