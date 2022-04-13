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
        Schema::create('employe_rol', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('employe_id')->unsigned();
            $table->bigInteger('rol_id')->unsigned();
           

            $table->foreign('employe_id')->references('id')->on('employes')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('rol_id')->references('id')->on('rols')
            ->onDelete('cascade')
            ->onUpdate('cascade');
          
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
        Schema::dropIfExists('employe_rol');
    }
};
