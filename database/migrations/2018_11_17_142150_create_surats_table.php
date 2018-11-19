<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surats', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('surat_type_id')->unsigned();
            $table->integer('sender_id')->unsigned();
            $table->date('letter_date');
            $table->date('send_date');
            $table->string('number', 100)->nullable();
            $table->string('subject', 200)->nullable();
            $table->text('summary', 200)->nullable();
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
        Schema::dropIfExists('surats');
    }
}
