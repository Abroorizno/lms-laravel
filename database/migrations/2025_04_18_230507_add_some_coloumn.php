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
        Schema::table('users', function (Blueprint $table) {
            $table->string('nip', 20)->after('id');
            $table->unsignedBigInteger('class_id')->after('name')->nullable();
            $table->unsignedBigInteger('level_id')->after('class_id')->nullable();
            $table->string('phone', 13)->after('email_verified_at');
            $table->text('address')->after('phone');

            $table->foreign('class_id')->references('id')->on('majors')->onDelete('cascade');
            $table->foreign('level_id')->references('id')->on('levels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
