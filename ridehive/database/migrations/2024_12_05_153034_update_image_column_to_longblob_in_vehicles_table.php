<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UpdateImageColumnToLongblobInVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Change the `image` column to `LONGBLOB`
        DB::statement('ALTER TABLE vehicles MODIFY image LONGBLOB');
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Revert the `image` column to `BLOB` (or original type)
        DB::statement('ALTER TABLE vehicles MODIFY image BLOB');
    }
}

