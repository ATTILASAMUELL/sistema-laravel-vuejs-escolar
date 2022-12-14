<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlunoCursoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       

        Schema::create('aluno_curso', function (Blueprint $table) {
            //
            $table->id();
            $table->foreignId('aluno_id')->constrained('aluno')->onDelete('cascade');
            $table->foreignId('curso_id')->constrained('curso')->onDelete('cascade');

            

        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       
        Schema::dropIfExists('aluno_curso');
    }
}
