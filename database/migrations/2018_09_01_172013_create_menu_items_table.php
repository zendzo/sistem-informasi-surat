<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->integer('menu_category_id')->unsigned()->nullable()->default(1);
            $table->foreign('menu_category_id')->references('id')->on('menu_categories')->onDelete('cascade');
            $table->string('icon', 20)->nullable()->default('fa-circle-o');
            $table->string('url', 100)->nullable();
            $table->string('active', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_items');
    }
}
