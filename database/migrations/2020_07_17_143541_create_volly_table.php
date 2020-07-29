<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVollyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('volly', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('gender', ['male', 'female']);
            $table->unsignedBigInteger('class_id');
            $table->string('address');
            $table->string('phone_number');
            $table->string('parents_name');
            $table->string('hobby');
            $table->string('place_of_birth');
            $table->date('date_of_birth');
            $table->string('history_of_disiase')->nullable();
            $table->string('achievement')->nullable();
            $table->string('photo');
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
        Schema::dropIfExists('volly');
    }
}
