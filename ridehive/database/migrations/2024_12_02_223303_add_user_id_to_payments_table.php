<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable()->after('payment_id'); // Add `user_id` column
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade'); // Add foreign key
        });
    }

    public function down()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->dropForeign(['user_id']); // Drop foreign key
            $table->dropColumn('user_id'); // Drop `user_id` column
        });
    }
};
