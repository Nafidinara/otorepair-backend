<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailSparepartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_detail_spareparts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_sparepart_id')->nullable()->unsigned()
                ->references('id')
                ->on('order_spareparts')
                ->cascadeOnDelete();
            $table->foreignId('sparepart_id')->nullable()->unsigned()
                ->references('id')
                ->on('spareparts')
                ->cascadeOnDelete();
            $table->string('harga');
            $table->string('qty');
            $table->string('berat');
            $table->string('berat_total');
            $table->string('harga_total');
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
        Schema::dropIfExists('order_detail_spareparts');
    }
}
