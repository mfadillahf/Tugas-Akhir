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
        Schema::create('infaqs', function (Blueprint $table) {
            $table->id('id_infaq');
            $table->unsignedBigInteger('id_donatur');
            $table->integer('nominal');
            $table->timestamp('tanggal');
            $table->char('keterangan', 50)->nullable();
            $table->timestamps();

            $table->foreign('id_donatur')->references('id_donatur')->on('donaturs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('infaqs');
    }
};
