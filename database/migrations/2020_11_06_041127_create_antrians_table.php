<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAntriansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antrians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->unsigned()
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();
            $table->foreignId('bengkel_id')->nullable()->unsigned()
                ->references('id')
                ->on('bengkels')
                ->cascadeOnDelete();
            $table->foreignId('montir_id')->nullable()->unsigned()
                ->references('id')
                ->on('montirs')
                ->cascadeOnDelete();
            $table->string('lokasi_servis');
            $table->text('catatan')->nullable();
            $table->time('mulai');
            $table->time('akhir');
            $table->time('estimasi');
            $table->string('status');
            $table->string('payment_method');
            $table->string('total_harga_jasa');
            $table->string('total_harga_kebutuhan');
            $table->string('total_harga_keseluruhan');
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
        Schema::dropIfExists('antrians');
    }
}
