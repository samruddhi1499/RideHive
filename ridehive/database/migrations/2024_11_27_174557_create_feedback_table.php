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
    Schema::create('feedback', function (Blueprint $table) {
        $table->id('feedback_id');
        $table->foreignId('booking_id')->constrained('bookings', 'booking_id')->onDelete('cascade');
        $table->foreignId('user_id')->constrained('users', 'user_id')->onDelete('cascade');
        $table->integer('rating')->unsigned();
        $table->text('comment')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback');
    }
};
