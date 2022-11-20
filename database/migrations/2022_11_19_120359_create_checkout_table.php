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
            $table->string('code', 45)->nullable();
            $table->enum('status', ['unpaid', 'pending', 'paid'])->nullable();
            $table->integer('total_price')->nullable();
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
