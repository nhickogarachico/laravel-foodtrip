<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantRestaurantCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurant_restaurant_category', function (Blueprint $table) {
            $table->foreignId('restaurant_id')->constrained();
            $table->foreignId('restaurant_category_id')->constrained();
            $table->index(['restaurant_id', 'restaurant_category_id'], 'id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurant_restaurant_category');
    }
}
