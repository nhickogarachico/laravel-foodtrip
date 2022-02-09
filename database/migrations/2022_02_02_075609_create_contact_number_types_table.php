<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateContactNumberTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_number_types', function (Blueprint $table) {
            $table->id();
            $table->string('type');
        });

        DB::table('contact_number_types')->insert([
            ['type' => 'Mobile'],
            ['type' => 'Telephone']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_number_types');
    }
}
