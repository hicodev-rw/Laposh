<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel-info', function (Blueprint $table) {
            $table->id();  
            $table->string('name');
            $table->string('address');
            $table->string('email');
            $table->string('phone');
            $table->string('logo')->nullable();
            $table->longtext('about');
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
        Schema::dropIfExists('hotel-info');
    }
};
