<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGradesTable extends Migration
{

  public function up()
  {
    Schema::create('grades', function (Blueprint $table) {
      $table->increments('id');
      $table->text('name');
      $table->text('notes');
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::drop('grades');
  }
}
