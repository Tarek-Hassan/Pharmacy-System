<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColsEmailPasswordPasswordConfirmationGenderBirthdateMobile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('users', function (Blueprint $table) {
            $table->string('profile_pic');
            $table->unsignedInteger('national_id')->nullable();
            $table->string('password_confirmation')->nullable();
            $table->string('gender')->nullable();
            $table->date('birth_date')->nullable();
            $table->unsignedMediumInteger('mobile')->nullable();
            
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
