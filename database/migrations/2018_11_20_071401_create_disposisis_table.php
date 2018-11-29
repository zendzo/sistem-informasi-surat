<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisposisisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disposisis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('agenda_number', 100)->nullable();
            $table->date('recived_date')->nullable();
            $table->date('letter_date')->nullable();
            $table->string('original_sender_name')->nullable();
            $table->string('letter_number', 100)->nullable();
            $table->text('summary')->nullable();
            $table->string('letter_instruction', 200)->nullable();
            $table->integer('sender_id')->unsigned();
            $table->integer('letter_type_id')->unsigned();
            $table->string('subject', 200)->nullable();
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
        Schema::dropIfExists('disposisis');
    }
}
