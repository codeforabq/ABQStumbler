<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMainctagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mainctags', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('tag_id')->unsigned();
            
            $table->foreign('tag_id')
                    ->references('id')->on('tags')
                    ->onDelete('cascade');
            
            $table->integer('mainc_id')->unsigned();
            
            $table->foreign('mainc_id')
                    ->references('id')->on('maincs')
                    ->onDelete('cascade');
            
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
        Schema::drop('mainctags');
    }
}
