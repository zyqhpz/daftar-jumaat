<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSenaraisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('senarai_nama', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('tarikh');
            //create column with int data type
            $table->integer('status_pendaftaran');
            $table->integer('status_kehadiran');
            // create a foreign key 'phone' from table users to table senarai_nama
            // $table->foreignId('phone')->constrained();

            $table->string('phone_id')->unsigned()->index()->nullable();
            $table->foreign('phone_id')->references('phone')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('senarai_nama');
    }
}
