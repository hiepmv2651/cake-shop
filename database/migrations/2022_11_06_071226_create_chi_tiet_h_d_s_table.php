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
        Schema::create('chi_tiet_h_d_s', function (Blueprint $table) {
            $table->id();
            $table->string('price')->nullable();
            $table->string('quantity')->nullable();
            $table->string('hoadon_id')->nullable();
            $table->string('Product_id')->nullable();
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
        Schema::dropIfExists('chi_tiet_h_d_s');
    }
};
