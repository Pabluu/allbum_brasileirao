<?php

use App\Models\Clubes;
use App\Models\Posicao;
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
        Schema::create('jogador', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->date('data_nasc');
            $table->foreignIdFor(Posicao::class);
            $table->foreign('posicao_id')->references('id')->on('posicao');
            $table->foreignIdFor(Clubes::class);
            $table->foreign('clube_id')->references('id')->on('clubes');
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
        Schema::dropIfExists('jogador');
    }
};
