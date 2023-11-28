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
        Schema::create('objects__transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ObjectTR_ID');
            $table->unsignedBigInteger('TransOB_ID');
            $table->foreign('ObjectTR_ID')->references('ObjectID')->on('objects')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('TransOB_ID')->references('TransID')->on('transactions')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('objects__transactions');
    }
};
