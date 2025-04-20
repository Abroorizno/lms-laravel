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
        Schema::create('instructors', function (Blueprint $table) {
            $table->id();
            $table->string('nip', 20);
            $table->unsignedBigInteger('class_id');
            $table->string('name_instructor');
            $table->string('email_instructor')->unique();
            $table->string('phone_instructor')->unique();
            $table->text('address_instructor')->nullable();
            $table->string('password');
            $table->timestamps();

            $table->foreign('class_id')->references('id')->on('majors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instructors');
    }
};
