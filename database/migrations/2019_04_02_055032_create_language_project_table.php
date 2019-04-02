<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLanguageProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('language_project', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('project_id')->unsigned()->nullable()->references('id')->on('projects')->onDelete('cascade');
            $table->integer('language_id')->unsigned()->nullable()->references('id')->on('languages')->onDelete('cascade');
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
        Schema::dropIfExists('language_project');
    }
}
