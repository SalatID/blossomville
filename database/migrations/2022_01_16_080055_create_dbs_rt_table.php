<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDbsRtTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dbs_rt', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('rt_no');
            $table->string('rt_name',150);
            $table->unsignedInteger('rt_whatsapp');
            $table->string('rt_foto_src');
            $table->unsignedInteger('created_user');
            $table->unsignedInteger('updated_user');
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
        Schema::dropIfExists('dbs_rt');
    }
}
