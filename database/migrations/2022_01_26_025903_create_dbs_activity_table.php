<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDbsActivityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dbs_activity', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',100);
            $table->date('activity_date');
            $table->text('description');
            $table->text('activity_img',255);
            $table->integer('created_user');
            $table->integer('updated_user');
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
        Schema::dropIfExists('dbs_activity');
    }
}
