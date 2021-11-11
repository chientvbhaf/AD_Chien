<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_classes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('clas_name');
            $table->string('clas_desc');
            $table->string('clas_image')->default(null);
            $table->integer('clas_progress')->default(0);
            $table->integer('clas_lecturer')->default(null);
            $table->string('clas_slug');
            $table->integer('clas_status');
            $table->text('clas_post');
            $table->integer('clas_member')->default(0);
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
        Schema::dropIfExists('tbl_classes');
    }
}
