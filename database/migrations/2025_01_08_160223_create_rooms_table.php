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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('boarding_house_id')->constrained('boarding_houses')->cascadeOnDelete();
            $table->string('name');
            $table->string('room_type');
            $table->integer('square_feet');
            $table->integer('capacity');
            $table->integer('price_per_month');
            $table->boolean('is_available');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table->dropForeign('rooms_boarding_house_id_foreign');
        });
        Schema::dropIfExists('rooms');
    }
};
