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
        Schema::create('hutangs', function (Blueprint $table) {
            $table->id();
            $table->char('NOTRANSAKSI', 10);
            $table->char('KODESPL', 10);
            $table->dateTime('TGLBELI');
            $table->integer('TOTALHUTANG');
            
            $table->foreign('NOTRANSAKSI')->references('NOTRANSAKSI')->on('hbelis');
            
            $table->foreign('KODESPL')->references('KODESPL')->on('suppliers');
            
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
        Schema::dropIfExists('hutangs');
    }
};
