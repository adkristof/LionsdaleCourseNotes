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
        Schema::table('course_user_tables', function (Blueprint $table) {
            $table->foreignId('user_id')->default(1)->constrained();
            
            $table->foreignId('course_id')->default(1)->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('course_user_tables', function (Blueprint $table) {
            //
        });
    }
};
