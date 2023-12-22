<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivreEditeursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livre_editeurs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ID_LIVRE');
            $table->foreign('ID_LIVRE')->references('id')->on('livres');
            $table->unsignedBigInteger('ID_EDITEUR');
            $table->foreign('ID_EDITEUR')->references('id')->on('editeurs');
        
           
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
        Schema::dropIfExists('livre_editeurs');
    }
}
