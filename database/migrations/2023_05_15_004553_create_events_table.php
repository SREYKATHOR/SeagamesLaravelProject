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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->integer('total_ticket');
            $table->unsignedBigInteger('sport_id');
            $table->foreign('sport_id')
                    ->references('id')
                    ->on('sports')
                    ->onDelete('cascade');
            $table->unsignedBigInteger('stadium_id');
            $table->foreign('stadium_id')
                    ->references('id')
                    ->on('stadia')
                    ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
