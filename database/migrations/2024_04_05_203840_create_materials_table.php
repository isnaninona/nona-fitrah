<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('file_path');
            $table->timestamps();
            $table->unsignedBigInteger('mapel_id');
            $table->foreign('mapel_id')->references('id')
                    ->on('mapels')
                    ->onUpdate('cascade');
            $table->unsignedBigInteger('class_room_id');
            $table->foreign('class_room_id')->references('id')
                    ->on('class_rooms')
                    ->onUpdate('cascade');
            $table->unsignedBigInteger('major_id');
            $table->foreign('major_id')
                    ->references('id')
                    ->on('majors')
                    ->onUpdate('cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materials');
    }
}
