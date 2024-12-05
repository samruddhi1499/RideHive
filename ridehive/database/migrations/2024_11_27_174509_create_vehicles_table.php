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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id('vehicle_id');
            $table->foreignId('vendor_id')->constrained('users', 'user_id')->onDelete('cascade');
            $table->enum('type', ['Bike', 'Scooter']);
            $table->string('model', 100);
            $table->decimal('price_per_day', 10, 2);
            $table->enum('status', ['Available', 'Unavailable'])->default('Available');
            $table->binary('image')->nullable(); // Change to LONGBLOB
            $table->timestamps(); // Automatically adds `created_at` and `updated_at`
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
