<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHerbalMedicineCenterEmailTable extends Migration
{
    public function up()
    {
        Schema::create('harbal_center_email', function (Blueprint $table) {
            $table->increments('id');
            $table->string('harbal_center_email_ad')->nullable();
            $table->Integer('harbal_center_id')->unsigned();
            $table->timestamps();
            $table->foreign('harbal_center_id')->references('id')->on('harbal_center')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    
    public function down()
    {
       Schema::dropIfExists('harbal_center_email');
    }
}
