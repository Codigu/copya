<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CopyaFormMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forms', function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->string('display_name');
            $table->string('target');
            $table->timestamps();
        });

        Schema::create('fields', function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->string('display_name');
            $table->timestamps();
        });

        Schema::create('field_form', function(Blueprint $table){
            $table->increments('id');
            $table->integer('form_id')->unsigned();
            $table->integer('field_id')->unsigned();
            $table->string('rules')->nullable();
            $table->timestamps();

            $table->foreign('form_id')->references('id')->on('forms')
                ->onDelete('cascade');
            $table->foreign('field_id')->references('id')->on('fields')
                ->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('menu_navigation');
        Schema::drop('menus');
        Schema::drop('navigations');
        Schema::drop('links');
        Schema::drop('pages');
    }
}
