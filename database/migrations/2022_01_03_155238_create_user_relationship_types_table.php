<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateUserRelationshipTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_relationship_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        DB::table('user_relationship_types')->insert([
            ['name' => 'pending_first_second'],
            ['name' => 'pending_second_first'],
            ['name' => 'friends'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_relationship_types');
    }
}
