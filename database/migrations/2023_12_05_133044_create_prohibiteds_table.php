<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('prohibiteds', function (Blueprint $table) {
            $table->id();
            $table->String('Route');
            $table->double('start_longitude', 10, 6);
            $table->double('start_Latitude', 10, 6);
            $table->double('end_longitude', 10, 6);
            $table->double('end_Latitude', 10, 6);
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
        Schema::dropIfExists('prohibiteds');
    }
};
