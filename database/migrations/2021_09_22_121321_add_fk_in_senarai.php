<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkInSenarai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('senarai_nama', function (Blueprint $table) {
            $table->integer('tarikh_id')->unsigned()->index()->nullable();
            $table->foreign('tarikh_id')->references('tarikh_id')->on('tarikh');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('senarai_nama', function (Blueprint $table) {
            //
        });
    }
}
