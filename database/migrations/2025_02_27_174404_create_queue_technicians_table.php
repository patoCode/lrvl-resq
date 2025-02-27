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
        Schema::disableForeignKeyConstraints();

        Schema::create('queue_technicians', function (Blueprint $table) {
            $table->id();
            $table->integer('order')->default(0);
            $table->foreignId('technician_id')->constrained('users');
            $table->foreignId('queue_id')->constrained();
            $table->enum('status', ["active","inactive"])->default('active');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('queue_technicians');
    }
};
