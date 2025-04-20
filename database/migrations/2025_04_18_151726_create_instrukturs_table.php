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
        Schema::create('instrukturs', function (Blueprint $table) {
            $table->id();
            $table->string('nip', 20);
            $table->string('instructor_name');
            $table->string('instructor_email');
            $table->string('instructor_phone', 13);
            $table->text('instructor_address')->nullable();
            $table->string('passwords')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instrukturs');
    }
};
