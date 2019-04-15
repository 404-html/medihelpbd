<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkinCareLaserCenterPhoneTable extends Migration
{
    public function up()
    {
        Schema::create('skin_laser_center_phone', function (Blueprint $table) {
            $table->increments('id');
            $table->string('skin_laser_center_phone_no')->nullable();
            $table->Integer('skin_laser_center_id')->unsigned();
            $table->timestamps();
            $table->foreign('skin_laser_center_id')->references('id')->on('skin_laser_center')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    
    public function down()
    {
       Schema::dropIfExists('skin_laser_center_phone');
    }
}
