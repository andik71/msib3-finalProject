<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckoutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkout', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('code')->nullable();
            $table->string('status')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('payment_code')->nullable();
            $table->string('invoice')->nullable();
            $table->integer('total_price')->nullable();
            $table->date('time')->nullable();
            $table->timestamps();
            $table->integer('orders_id')->index('fk_checkout_orders1_idx');
            $table->integer('users_id')->index('fk_checkout_users1_idx');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('checkout');
    }
}
