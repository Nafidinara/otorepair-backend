<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBengkelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bengkels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();
            $table->string('nama_bengkel');
            $table->string('alamat');
            $table->string('lokasi');
            $table->date('tgl_berdiri_bengkel')->nullable();
            $table->string('telfon');
            $table->string('batas_jangkauan_konsumen');
            $table->string('lokasi_servis')->default('keduanya');
            $table->string('type')->default('umum');
            $table->time('jam_buka');
            $table->time('jam_tutup');
            $table->string('foto')->nullable();
            $table->text('info_tambahan')->nullable();
            $table->json('category')->nullable();
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
        Schema::dropIfExists('bengkels');
    }
}
