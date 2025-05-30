<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mapels', function (Blueprint $table) {
            $table->id('id_mapel');
            $table->unsignedBigInteger('id_guru');
            $table->char('mapel', 50);
            $table->string('deskripsi', 255)->nullable();
            $table->timestamps();

            $table->foreign('id_guru')->references('id_guru')->on('gurus')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mapels');
    }
};
