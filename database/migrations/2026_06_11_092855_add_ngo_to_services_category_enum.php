<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddNgoToServicesCategoryEnum extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("ALTER TABLE services MODIFY COLUMN category ENUM('travel', 'legal', 'research', 'registration', 'ict', 'ngo')");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("ALTER TABLE services MODIFY COLUMN category ENUM('travel', 'legal', 'research', 'registration', 'ict')");
    }
}
