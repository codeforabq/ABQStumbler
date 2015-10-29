<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaincomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maincoms', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('user_id')->unsigned();
            
            $table->foreign('user_id')
                    ->references('id')->on('users')
                    ->onDelete('cascade');
            
            $table->integer('mainc_id')->unsigned();
            
            $table->foreign('mainc_id')
                    ->references('id')->on('maincs')
                    ->onDelete('cascade');
            
            $table->longText('body');
            
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
        Schema::drop('maincoms');
    }
}
