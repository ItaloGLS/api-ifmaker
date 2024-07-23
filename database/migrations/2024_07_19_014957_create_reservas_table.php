<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasTable extends Migration
{
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->string('from_name');
            $table->string('email');
            $table->string('whatsapp');
            $table->string('user_type');
            $table->string('activity_nature');
            $table->text('project_details');
            $table->string('target_audience');
            $table->integer('number_of_people');
            $table->string('horario');
            $table->string('stations');
            $table->enum('status', ['pendente', 'aprovado', 'recusado', 'finalizado'])->default('pendente');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservas');
    }
}
