<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateLocalitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('localities', function (Blueprint $table) {
            $table->id();
            $table->string('locality');
            $table->foreignId('area_id')->constrained();
            $table->foreignId('locality_type_id')->constrained();
        });

        DB::table('localities')->insert([
            ['locality' => 'Makati', 'area_id' => 1, 'locality_type_id' => 1],
            ['locality' => 'Mandaluyong', 'area_id' => 1, 'locality_type_id' => 1],
            ['locality' => 'Dasmariñas', 'area_id' => 2, 'locality_type_id' => 2],
            ['locality' => 'Bacoor', 'area_id' => 2, 'locality_type_id' => 2],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('localities');
    }
}
