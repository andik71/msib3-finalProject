<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->foreign(['checkout_id'], 'fk_orders_checkout1')->references(['id'])->on('checkout')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['products_id'], 'fk_orders_products1')->references(['id'])->on('products')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign('fk_orders_checkout1');
            $table->dropForeign('fk_orders_products1');
        });
    }
}
