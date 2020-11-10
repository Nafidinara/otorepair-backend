<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderSparepartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_spareparts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->unsigned()
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();
            $table->foreignId('bengkel_id')->nullable()->unsigned()
                ->references('id')
                ->on('bengkels')
                ->cascadeOnDelete();
            $table->integer('berat');
            $table->string('total_ongkir');
            $table->string('harga_sparepart');
            $table->string('harga_keseluruhan');
            $table->string('payment_method');
            $table->string('waybill')->nullable();
            $table->string('shiping_service');
            $table->text('address');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_spareparts');
    }
}
