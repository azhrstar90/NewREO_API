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
        Schema::create('clients__transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ClientTR_ID');
            $table->unsignedBigInteger('TransCL_ID');
            $table->foreign('ClientTR_ID')->references('ClientsID')->on('clients')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('TransCL_ID')->references('TransID')->on('transactions')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients__transactions');
    }
};
