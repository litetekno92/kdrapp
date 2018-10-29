<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryNoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_note', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('category_id')->unsigned();
            $table->integer('note_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')
             ->onDelete('cascade');
            $table->foreign('Note_id')->references('id')->on('notes')
             ->onDelete('cascade');
            $table->index(['note_id', 'category_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropForeign(['note_id']);
        $table->dropForeign(['category_id']);
        Schema::dropIfExists('category_note');
    }
}
