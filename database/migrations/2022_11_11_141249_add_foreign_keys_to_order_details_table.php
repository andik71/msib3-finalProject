<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_details', function (Blueprint $table) {
            $table->foreign(['products_id'], 'fk_order_details_products1')->references(['id'])->on('products')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['user_id'], 'fk_order_details_user1')->references(['id'])->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_details', function (Blueprint $table) {
            $table->dropForeign('fk_order_details_products1');
            $table->dropForeign('fk_order_details_user1');
        });
    }
}
