<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFieldProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('field_product', function (Blueprint $table) {
            $table->id();
            $table->string('value')->nullable();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('field_id');
            $table->index(['product_id', 'field_id']);
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
        Schema::dropIfExists('field_product');
    }
}
