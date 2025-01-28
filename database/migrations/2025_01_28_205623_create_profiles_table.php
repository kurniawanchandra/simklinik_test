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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('profile_picture')->nullable();
            $table->text('about')->nullable();
            $table->string('company');
            $table->string('country');
            $table->string('city');
            $table->string('address');
            $table->string('phone');
            $table->string('ig_account')->nullable();
            $table->string('fb_account')->nullable();
            $table->string('tw_account')->nullable();
            $table->string('linkedin_account')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
