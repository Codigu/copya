<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetupCopyaTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('title');
            $table->string('slug');
            $table->text('content');
            $table->string('layout')->default('default');
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')
                ->on('users')->onDelete('cascade')
                ->onUpdate('cascade');
        });

        Schema::create('navigations', function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->string('display_name');
            $table->timestamps();
        });

        Schema::create('menus', function(Blueprint $table){
            $table->increments('id');
            $table->string('url');
            $table->string('menuable_id');
            $table->string('menuable_type');
            $table->timestamps();
        });

        Schema::create('links', function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->string('url');
            $table->timestamps();
        });

        Schema::create('navigation_items', function(Blueprint $table){
            $table->increments('id');
            $table->integer('navigation_id')->unsigned();
            $table->integer('menu_id')->unsigned();
            $table->integer('weight')->default(0);
            $table->integer('parent_id')->unsigned();
            $table->string('url');
            $table->string('name');
            $table->string('target',25);
            $table->text('description');
            $table->boolean('active');
            $table->string('rel',50);
            $table->boolean('secure');
            $table->timestamps();

            $table->foreign('navigation_id')->references('id')->on('navigations')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('menu_id')->references('id')->on('menus')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('parent_id')->references('id')->on('navigation_items')
                ->onDelete('cascade')->onUpdate('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pages');
        Schema::drop('menus');
        Schema::drop('navigations');
        Schema::drop('links');
        Schema::drop('navigation_items');
    }
}
