<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBasketRepositoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('basket_repository', function (Blueprint $table) {
            $table->unsignedInteger('basket_id');
            $table->foreign('basket_id')->references('id')->on('baskets')->onDelete('cascade');
            $table->unsignedInteger('repository_id');
            $table->foreign('repository_id')->references('id')->on('repositories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('basket_repository');
    }
}
