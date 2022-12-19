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
            $table->string('name', 45)->nullable();
            $table->string('desc', 500)->nullable();
            $table->double('price')->nullable();
            $table->string('stok', 45)->nullable();
            $table->string('sold', 45)->nullable();
            $table->string('photo', 45)->nullable();
            $table->integer('category_id')->index('fk_products_category1_idx');
            $table->integer('store_id')->index('fk_products_store1_idx');
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('created_at')->nullable();

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
