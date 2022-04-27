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
        Schema::create('client_records', function (Blueprint $table) {
            $table->string('id')->primary();            
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->text('street_address');
            $table->string('city');
            $table->string('state');
            $table->integer('zip');
            $table->text('desc');
            $table->integer('code');
            $table->boolean(('isActive'));
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
        Schema::dropIfExists('client_records');
    }
};
