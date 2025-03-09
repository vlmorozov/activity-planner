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
        Schema::create('activity_events', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('activity_group_id')->constrained()->onDelete('cascade');

            $table->date('start_date');
            $table->time('start_time')->nullable();
            $table->date('finish_date')->nullable();
            $table->time('finish_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_events');
    }
};
