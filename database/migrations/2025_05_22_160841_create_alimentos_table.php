<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
public function up()
{
Schema::create('alimentos', function (Blueprint $table) {
$table->id();
$table->string('nome');
$table->integer('quantidade');
$table->date('validade')->nullable();
$table->timestamps();
$table->unsignedBigInteger('categoria_id')->nullable();
$table->foreign('categoria_id')->references('id')->on('categorias');
});
}

public function down()
{
Schema::dropIfExists('alimentos');
}
};