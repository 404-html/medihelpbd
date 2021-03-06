<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBloodDonorEmailTable extends Migration
{
    public function up()
    {
        Schema::create('blood_donor_email', function (Blueprint $table) {
            $table->increments('id');
            $table->string('blood_donor_email_ad')->nullable();
            $table->Integer('blood_donor_id')->unsigned();
            $table->timestamps();
            $table->foreign('blood_donor_id')->references('id')->on('blood_donor')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    
    public function down()
    {
       Schema::dropIfExists('blood_donor_email');
    }
}
