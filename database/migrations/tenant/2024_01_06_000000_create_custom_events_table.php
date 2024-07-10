<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('custom_events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('code')->nullable();
            $table->text('attributes')->nullable();
            $table->boolean('active')->default(false);
            $table->timestamps();
        });

        Schema::create('customer_events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id');
            $table->foreignId('event_id');
            $table->foreignId('client_id')->nullable();
            $table->text('attributes')->nullable();
            $table->text('payload')->nullable();
            $table->dateTime('event_date')->nullable();
            $table->timestamps();
        });
    }
};
