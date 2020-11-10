<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_detail_services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('antrian_id')->nullable()->unsigned()
                ->references('id')
                ->on('antrians')
                ->cascadeOnDelete();
            $table->string('nama');
            $table->string('harga');
            $table->text('keterangan');
            $table->string('qty');
            $table->string('harga_total');
            $table->string('type');
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
        Schema::dropIfExists('order_detail_services');
    }
}
