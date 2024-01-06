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
        Schema::create('senior_citizens', function (Blueprint $table) {
            $table->id();
            $table->string('seniorID')->unique();
            $table->string('firstName');
            $table->string('middleName')->nullable();
            $table->string('lastName');
            $table->string('gender');
            $table->date('birthday');
            $table->integer('age');
            $table->string('birthPlace');
            $table->text('address');
            $table->string('contactNumber');
            $table->string('pensionstatus');
            $table->decimal('monthlyPension', 10, 2);
            $table->string('status');
            $table->string('emergencyContactPerson');
            $table->string('emergencyContactPersonNumber');
            $table->text('emergencyContactPersonAddress');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('senior_citizens');
    }
};