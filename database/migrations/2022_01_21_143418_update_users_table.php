<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // $table->renameColumn('name', 'full_name');
            // $table->string('place_birth', 100)->nullable();
            // $table->date('date_birth')->nullable();
            // $table->string('gender', 6)->nullable();
            // $table->string('blod_type', 3)->nullable();
            // $table->string('religion', 50)->nullable();
            // $table->string('job', 150)->nullable();
            // $table->string('nik', 17)->nullable();
            // $table->string('kk', 17)->nullable();
            // $table->string('sts', 5)->nullable();
            // $table->text('address')->nullable();
            // $table->string('block', 5)->nullable();
            // $table->string('house_number', 3)->nullable();
            // $table->integer('id_rt')->unsigned()->nullable();
            // $table->string('rw', 100)->nullable();
            // $table->string('village', 100)->nullable();
            // $table->string('distric', 100)->nullable();
            // $table->string('city', 100)->nullable();
            // $table->string('province', 100)->nullable();
            // $table->string('level', 1)->nullable();
            // $table->string('verified', 1)->nullable();
            $table->string('img_ktp', 255)->nullable();
            $table->string('img_kk', 225)->nullable();
            $table->string('marriage', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
