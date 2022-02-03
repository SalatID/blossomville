<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLetterSubmisionLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('letter_submision_log', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sts_before',3);
            $table->string('sts_after',3)->nullable();
            $table->integer('id_letter_submision')->nullable();
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
        Schema::dropIfExists('letter_submision_log');
    }
}
