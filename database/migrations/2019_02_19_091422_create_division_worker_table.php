<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDivisionWorkerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('division_worker', function (Blueprint $table) {
            $table->integer('division_id')->unsigned()->index();
			$table->foreign('division_id')->references('id')->on('divisions')->onDelete('cascade');
			$table->integer('worker_id')->unsigned()->index();
			$table->foreign('worker_id')->references('id')->on('workers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('division_worker');
    }
}
