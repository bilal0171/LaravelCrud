<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('userdetails', function (Blueprint $table) {
            $table->string('password')->after('name')->nullable();
            $table->string('email')->after('name')->nullable();
            $table->rememberToken()->after('password');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('userdetails', function (Blueprint $table) {
            $table->dropColumn('password');
            $table->dropColumn('email');
            $table->dropRememberToken();
        });
    }
};
