<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->text('content');
            $table->tinyInteger('category_id')->unsigned();
            $table->tinyInteger('status_id')->unsigned();
            $table->string('img')->nullable();
            $table->double('price')->unsigned()->default(0);
            $table->double('old_price')->unsigned()->default(0);
            $table->tinyInteger('hit')->unsigned()->default(0);
            $table->tinyInteger('sale')->unsigned()->default(0);
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
        Schema::dropIfExists('products');
    }
}
