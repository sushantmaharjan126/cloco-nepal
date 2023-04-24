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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone')->nullable()->dufault(null);
            $table->dateTime('dob')->nullable()->dufault(null);
            $table->enum('gender', ['M', 'F', 'O'])->dufault('M');
            $table->string('address')->nullable()->dufault(null);
            $table->enum('status', ['Active', 'Inactive'])->dufault('Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
