<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubMenuItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_menu_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->integer('menu_item_id')->unsigned()->nullable()->default(1);
            $table->foreign('menu_item_id')->references('id')->on('menu_items')->onDelete('cascade');
            // still looking for solution fot three levels menu
            // $table->integer('parent_id')->nullable()->default(NULL);
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
        Schema::dropIfExists('sub_menu_items');
    }
}
