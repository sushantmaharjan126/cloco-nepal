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
        Schema::create('artists', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->dateTime('dob')->nullable()->dufault(null);
            $table->enum('gender', ['M', 'F', 'O'])->dufault('M');
            $table->string('address')->nullable()->dufault(null);
            $table->date('first_release_year')->nullable()->dufault(null);
            $table->integer('no_of_album_release')->dufault(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artists');
    }
};
