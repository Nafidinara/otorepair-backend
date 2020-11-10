<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMontirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('montirs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bengkel_id')->nullable()->unsigned()
                ->references('id')
                ->on('bengkels')
                ->cascadeOnDelete();
            $table->string('name');
            $table->text('biografi');
            $table->string('foto')->nullable();
            $table->json('pencapaian')->nullable();
            $table->string('no_hp');
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
        Schema::dropIfExists('montirs');
    }
}
