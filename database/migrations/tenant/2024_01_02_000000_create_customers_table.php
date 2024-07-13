<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('gender')->nullable();
            $table->string('password')->nullable();
            $table->date('birth')->nullable();
            $table->string('referrer_token')->nullable();
            $table->string('register_referrer_token')->nullable();
            $table->dateTime('registered_at')->nullable();
            $table->unsignedBigInteger('tier_id')->nullable();
            $table->text('meta')->nullable();
            $table->timestamps();
        });
    }
};
