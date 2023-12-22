<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateachatLivresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('achat_livres', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ID_ACHAT');
            $table->foreign('ID_ACHAT')->references('id')->on('achats');
            $table->unsignedBigInteger('ID_LIVRE');
            $table->foreign('ID_LIVRE')->references('id')->on('livres');
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
        Schema::dropIfExists('achat_livres');
    }
}
