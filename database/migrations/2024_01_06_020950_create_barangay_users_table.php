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
        Schema::create('barangay_users', function (Blueprint $table) {
            $table->id();
            $table->string('barangayID');
            $table->string('fullName');
            $table->string('contactNumber', 20);
            $table->string('userName');
            $table->string('password');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangay_users');
    }
};