<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('number')->nullable();
            $table->string('status')->nullable()->index();
            $table->string('reference_id')->nullable()->index();
            $table->foreignId('customer_id')->nullable()->index();
            $table->string('currency')->nullable()->index();
            $table->decimal('points_earned')->nullable()->index();
            $table->decimal('total')->nullable();
            $table->text('totals')->nullable();
            $table->text('items')->nullable();
            $table->text('payments')->nullable();
            $table->text('payload')->nullable();
            $table->string('channel')->nullable()->index();
            $table->timestamps();
        });
    }

};
