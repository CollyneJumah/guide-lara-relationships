<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFathersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fathers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('grand_father_id');
            //add constrain
    //==========================================================
            $table->foreign('grand_father_id')
                    ->references('id')
                    ->on('grand_fathers')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
    //==========================================================
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('created_by');
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
        Schema::dropIfExists('fathers');
    }
}
