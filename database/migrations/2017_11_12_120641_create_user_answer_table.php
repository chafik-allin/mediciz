<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAnswerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_answer', function (Blueprint $table) {
            //Chaque cours a ses propres questions
            //pas de meme answer_id pour multiple cours, sinon => ambiguité 
            $table->integer('user_id');
            $table->integer('course_id');
            $table->integer('qcm_id');
            $table->integer('answer_id');
            $table->primary(['answer_id', 'user_id','course_id', 'qcm_id'], 'aucq');
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
        Schema::dropIfExists('user_answer');
    }
}
