<?php

use App\Models\Clubes;
use App\Models\Posicao;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('jogador', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->date('data_nasc');

            $table->foreignId('clube_id')->constrained('clube');
            $table->foreignId('posicao_id')->constrained('posicao');

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
