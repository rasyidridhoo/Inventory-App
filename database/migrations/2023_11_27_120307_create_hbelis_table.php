<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hbelis', function (Blueprint $table) {
            $table->id();
            $table->char('NOTRANSAKSI', 10)->unique();
            $table->char('KODESPL', 10);
            $table->dateTime('TGLBELI');
            
            $table->timestamps();

            $table->foreign('KODESPL')->references('KODESPL')->on('suppliers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hbelis');
    }
};
