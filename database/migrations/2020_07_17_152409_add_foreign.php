<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rohis', function (Blueprint $table) {
            $table->foreign('class_id')->references('id')->on('class');
        });

        Schema::table('silat', function (Blueprint $table) {
            $table->foreign('class_id')->references('id')->on('class');
        });

        Schema::table('marching', function (Blueprint $table) {
            $table->foreign('class_id')->references('id')->on('class');
        });

        Schema::table('futsal', function (Blueprint $table) {
            $table->foreign('class_id')->references('id')->on('class');
        });

        Schema::table('pmr', function (Blueprint $table) {
            $table->foreign('class_id')->references('id')->on('class');
        });

        Schema::table('volly', function (Blueprint $table) {
            $table->foreign('class_id')->references('id')->on('class');
        });

        Schema::table('pramuka', function (Blueprint $table) {
            $table->foreign('class_id')->references('id')->on('class');
        });

        Schema::table('paskibra', function (Blueprint $table) {
            $table->foreign('class_id')->references('id')->on('class');
        });

        Schema::table('basket', function (Blueprint $table) {
            $table->foreign('class_id')->references('id')->on('class');
        });

        Schema::table('seni', function (Blueprint $table) {
            $table->foreign('class_id')->references('id')->on('class');
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
