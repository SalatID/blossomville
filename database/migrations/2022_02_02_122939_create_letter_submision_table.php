<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLetterSubmisionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('letter_submision', function (Blueprint $table) {
            $table->increments('id');
            $table->string('letter_no');
            $table->integer('letter_id')->nullable();
            $table->string('status',3);
            $table->integer('letter_for')->nullabel();
            $table->integer('created_user');
            $table->integer('updated_user')->nullable();
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
        Schema::dropIfExists('letter_submision');
    }
}
