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
        Schema::table('users', function (Blueprint $table) {
            $table->string('otp', 20)->nullable()->after('password');

            // Correct column name with underscore
            $table->dropColumn('remember_token');

            // These columns already exist from timestamps(), so drop them first
            $table->dropColumn(['created_at', 'updated_at']);

            // Add new timestamp columns with your custom settings
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('otp');

            // Restore remember_token
            $table->rememberToken();

            // Drop custom timestamps
            $table->dropColumn(['created_at', 'updated_at']);

            // Restore default timestamps
            $table->timestamps();
        });
    }
};
