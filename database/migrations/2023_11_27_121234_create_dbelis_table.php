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
        Schema::create('dbelis', function (Blueprint $table) {
            $table->id();
            $table->char('NOTRANSAKSI', 10);
            $table->char('KODEBRG', 10);
            $table->integer('HARGABELI');
            $table->integer('QTY');
            $table->integer('DISKON');
            $table->integer('DISKONRP');
            $table->integer('TOTALRP');
            
            $table->foreign('NOTRANSAKSI')->references('NOTRANSAKSI')->on('hbelis');
            $table->foreign('KODEBRG')->references('KODEBRG')->on('barangs');
            $table->foreign('HARGABELI')->references('HARGABELI')->on('barangs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dbelis');
    }
};
