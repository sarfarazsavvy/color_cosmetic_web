<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeautyAdvisorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beauty_advisors', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("username");
            $table->string("email");
            $table->bigInteger("cnic");
            $table->string("password");
            $table->bigInteger("contact");
            $table->bigInteger("store");
            $table->bigInteger("sales")->nullable();
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
        Schema::dropIfExists('beauty_advisors');
    }
}
