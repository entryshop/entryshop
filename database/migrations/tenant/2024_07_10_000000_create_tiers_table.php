<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tier_sets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('tiers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('tier_set_id')->index();
            $table->integer('level')->nullable();
            $table->timestamps();
        });
    }
};
