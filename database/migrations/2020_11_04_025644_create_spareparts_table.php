<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSparepartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spareparts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->nullable()->unsigned()
                ->references('id')
                ->on('categories')
                ->nullOnDelete();
            $table->foreignId('bengkel_id')->nullable()->unsigned()
                ->references('id')->on('bengkels')
                ->cascadeOnDelete();
            $table->string('name');
            $table->string('foto')->nullable();
            $table->text('deskripsi');
            $table->string('merk')->nullable();
            $table->string('berat');
            $table->string('stok');
            $table->string('status')->default('active');
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
        Schema::dropIfExists('spareparts');
    }
}
