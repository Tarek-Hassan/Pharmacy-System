<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePharmaciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pharmacies', function (Blueprint $table) {
<<<<<<< HEAD
            
=======
            //img not added
>>>>>>> 53f0ad8c1cb9ac6d4a84e6f2ad03b87b50385d9c
            $table->id();
            $table->unsignedInteger('national_id');
            $table->string('pharmacy_name',100);
            $table->string('img');
            $table->string('password');
            $table->string('email')->unique();
            $table->string('priority');
            $table->unsignedInteger('address_id');
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
        Schema::dropIfExists('pharmacies');
    }
}
