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
            $table->integer('id', true);
            $table->string('code', 45);
            $table->string('name', 45);
            $table->string('desc', 500);
            $table->integer('price');
            $table->string('stok', 45);
            $table->string('sold', 45);
            $table->string('photo', 45)->nullable();
            $table->integer('category_id')->index('fk_products_category_idx');
            $table->integer('store_id')->index('fk_products_store1_idx');
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
