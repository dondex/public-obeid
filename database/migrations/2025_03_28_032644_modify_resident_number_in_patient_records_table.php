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
        Schema::table('patient_records', function (Blueprint $table) {
            $table->string('resident_number')->nullable()->change(); // Make resident_number nullable
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('patient_records', function (Blueprint $table) {
            $table->string('resident_number')->nullable(false)->change(); // Revert to not nullable
        });
    }
};
