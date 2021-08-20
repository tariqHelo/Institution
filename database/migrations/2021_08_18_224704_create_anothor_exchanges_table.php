<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnothorExchangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anothor_exchanges', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('id_number');
            $table->longText('note');
            $table->integer('quantity');
            $table->string('address');
            $table->foreignId('basket_id')->constrained('baskets')->on('id')->restrictOnDelete();
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
        Schema::dropIfExists('anothor_exchanges');
    }
}
