<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateToDoItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('to_do_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('to_do_list_id');
            $table->string('description');
            $table->boolean('completed')->default(0);
            $table->timestamps();

            $table->foreign('to_do_list_id')->references('id')->on('to_do_lists')
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
        Schema::dropIfExists('to_do_items');
    }
}
