<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->nullable()->unsigned()
                ->references('id')
                ->on('categories')
                ->nullOnDelete();
            $table->foreignId('bengkel_id')->nullable()->unsigned()
                ->references('id')->on('bengkels')
                ->cascadeOnDelete();
            $table->string('name');
            $table->integer('harga');
            $table->string('jenis');
            $table->text('keterangan')->nullable();
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
        Schema::dropIfExists('servis');
    }
}
