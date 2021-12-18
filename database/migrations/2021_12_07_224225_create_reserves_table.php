<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserves', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('national_code');
            // $table->bigInteger('national_code2');
            // $table->bigInteger('national_code3');
            $table->bigInteger('Seatـnumber1');
            // $table->bigInteger('Seatـnumber2');
            // $table->bigInteger('Seatـnumber3');
            $table->string('gender');
            $table->timestamps();
            $table->softDeletes();
            $table->bigInteger('Total');
            $table->unsignedBigInteger('user_id')->index();
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('ticket_id')->index();
            $table->foreign('ticket_id')
            ->references('id')
            ->on('tickets')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reserves');
    }
}
