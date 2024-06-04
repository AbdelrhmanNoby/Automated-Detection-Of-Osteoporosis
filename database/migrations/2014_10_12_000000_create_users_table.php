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
        Schema::create('users', function (Blueprint $table) {
             $table->id();
            $table->string('fname');
            $table->string('lname');
            $table->string('email')->unique();
            $table->integer('age');
            $table->enum('gender', ['male', 'female']); 
            $table->string('phone');
            $table->string('password');
            $table->enum('title', ['Inter Doctor', 'Resident Doctor','Specialist Doctor','Senior Specialist Doctor','Consultant Doctor','Senior Consultant Doctor','Professor Doctor']); 
            $table->string('practice_number');
            $table->string('token');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
