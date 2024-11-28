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
        Schema::create('availabilities', function (Blueprint $table) {
            $table->id('availability_id');
        $table->foreignId('vehicle_id')->constrained('vehicles', 'vehicle_id')->onDelete('cascade');
        $table->date('start_date');
        $table->date('end_date');
        $table->enum('status', ['Available', 'Booked', 'Unavailable'])->default('Available');
        $table->foreignId('booking_id')->nullable()->constrained('bookings', 'booking_id')->onDelete('set null');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('availabilities');
    }
};
