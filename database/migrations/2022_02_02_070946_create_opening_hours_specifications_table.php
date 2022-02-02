<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpeningHoursSpecificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opening_hours_specifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('restaurant_outlet_id')->nullable()->constrained();
            $table->time('opens');
            $table->time('closes');
            $table->integer('dayOfTheWeek');
            $table->date('validFrom')->default(Carbon::now());
            $table->date('validThrough')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('opening_hours_specifications');
    }
}
