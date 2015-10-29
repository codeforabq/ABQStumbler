<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaincsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maincs', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('user_id')->unsigned();
            
            $table->foreign('user_id')
                    ->references('id')->on('users')
                    ->onDelete('cascade');
            
            $table->string('title');
            
            $table->string('summary');
            
            $table->longText('body');
            
            $table->string('slug')->unique();
            
            $table->boolean('edited');
            
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
        Schema::drop('maincs');
    }
}
