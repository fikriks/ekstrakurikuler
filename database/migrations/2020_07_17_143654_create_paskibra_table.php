<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaskibraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paskibra', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('class_id');
            $table->string('phone_number');
            $table->string('school_origin');
            $table->string('place_of_birth');
            $table->date('date_of_birth');
            $table->string('hobby');
            $table->string('future_goals');
            $table->text('motivation');
            $table->string('permission_of_parents');
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
        Schema::dropIfExists('paskibra');
    }
}
