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
        Schema::create('annonces', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->string('phone_appel');
            $table->string('phone_wathsapp')->nullable();
            $table->foreignId('user_id')->constrained('users');
            $table->morphs('annonceable');
            $table->string('cover');
            $table->foreignId('city_id')->constrained('cities');
            $table->decimal('price', 10, 2);
            $table->boolean('approuved')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('annonces');
    }
};
