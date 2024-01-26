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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customers_id');
            $table->foreignId('room_id');
            $table->integer('numOfRoom');
            $table->timestamp('checkIn')->nullable();
            $table->timestamp('checkOut')->nullable();
            $table->integer('priceSum');
            $table->enum('status', [1, 2, 3])->default(1);
            $table->string('note');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
