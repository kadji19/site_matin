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
        Schema::create('beta_signups', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 60);
            $table->string('email', 120)->unique();
            $table->string('os', 10); // android | ios
            $table->string('unsubscribe_token', 64)->unique();
            $table->timestamp('consented_at');
            $table->timestamp('unsubscribed_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beta_signups');
    }
};
