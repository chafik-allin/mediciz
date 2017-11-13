<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingUserTable extends Migration
{

    public function up()
    {
        Schema::create('training_user', function (Blueprint $table) {
            $table->integer('training_id');
            $table->integer('user_id');
            $table->primary(['user_id', 'training_id'], 'trus');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('training_user');
    }
}
