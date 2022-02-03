<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLetterTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('letter_type', function (Blueprint $table) {
            $table->increments('id');
            $table->string('letter_name',150);
            $table->string('status',3);
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
        Schema::dropIfExists('letter_type');
    }
}
