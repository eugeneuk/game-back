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
            $table->text('name')->nullable();
            $table->text('description')->nullable();
            $table->integer('price')->nullable()->default(0); // Price in Cents

            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('game_id')->nullable();
            $table->unsignedBigInteger('type_id')->nullable();

            $table->index(['user_id', 'game_id', 'type_id']);
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
