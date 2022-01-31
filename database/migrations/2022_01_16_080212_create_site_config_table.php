<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteConfigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_config', function (Blueprint $table) {
            $table->increments('id');
            $table->string('site_title',100);
            $table->string('site_description',150);
            $table->string('site_icon',150);
            $table->string('site_favicon',150);
            $table->string('site_whatsapp',14);
            $table->string('site_whatsapp_on',1);
            $table->string('site_email',50);
            $table->string('site_email_on',1);
            $table->string('site_instagram',50);
            $table->string('site_instagram_on',1);
            $table->string('site_twitter',50);
            $table->string('site_twitter_on',1);
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
        Schema::dropIfExists('site_config');
    }
}
