<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->nullable();
            $table->text('value')->nullable();
            $table->string('type')->nullable();
            $table->boolean('is_pubic')->default(false);
            $table->timestamps();
        });
    }
};