<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('quantity');
            $table->decimal('total',12,2);
            $table->decimal('discount',12,2);
            $table->decimal('iva',12,2);
            $table->boolean('state');
            $table->string('size');
            $table->foreignId('product_id')->constrained('products');
            $table->foreignId('car_id')->constrained('cars');
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
        Schema::dropIfExists('car_details');
    }
}
