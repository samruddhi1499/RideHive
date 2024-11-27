<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id('payment_id');
            $table->foreignId('booking_id')->constrained('bookings', 'booking_id')->onDelete('cascade');
            $table->decimal('amount', 10, 2);
            $table->timestamp('payment_date')->nullable();
            $table->enum('payment_method', ['Credit Card', 'PayPal', 'Bank Transfer']);
            $table->enum('status', ['Successful', 'Failed', 'Pending'])->default('Pending');
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
