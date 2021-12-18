return User::create([
            'name' => $data['name'] ,
            'email' => $data['email'] ,
            'password' => Hash::make($data['password'] ),
            'role_id'=>1,
        ]);<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('license_plate');
            $table->bigInteger('passenger');
            $table->string('final_destination');
            // $table->string('secondary_destination');
            $table->string('destination_terminal');
            $table->string('origin');
            $table->string('origin_terminal');
            $table->bigInteger('price');
            $table->string('type');
            $table->softDeletes();
            $table->string('info');
            $table->timestamp('time');
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
        Schema::dropIfExists('tickets');
    }
}
