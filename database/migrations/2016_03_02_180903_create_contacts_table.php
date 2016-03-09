<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstName');
            $table->string('lastName');
            $table->integer('phone');
            $table->string('email')->unique();
            $table->string('address');
            $table->enum('category',['family','friends','work']);
            $table->integer('user_id')->unsigned();
            //$table->integer('cat_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users'); 
            //$table->foreign('cat_id')->references('id')->on('categories'); 
            
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
        Schema::drop('contacts');
    }
}