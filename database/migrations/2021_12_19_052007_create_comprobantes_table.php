<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComprobantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comprobantes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger("tipo_comprobante_id")->unsigned();
            $table->string("serie",10);
            $table->bigInteger("correlativo");
            $table->date("fecha");
            $table->decimal("monto",$precision=11,$scale=2)->default("0");
            $table->timestamps();
            $table->foreign('tipo_comprobante_id')->references('id')->on('tipo_comprobantes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comprobantes');
    }
}
