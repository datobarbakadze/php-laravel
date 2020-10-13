<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string("full_name");
            $table->string("position");
            $table->string("image")->nullable();
            $table->string("facebook")->nullable()->default(null);
            $table->string('googleplus')->nullable()->default(null);
            $table->string("twitter")->nullable()->default(null);
            $table->string("pinterest")->nullable()->default(null);
            $table->string("linkedin")->nullable()->default(null);
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
        Schema::dropIfExists('teams');
    }
}
