<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('points', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wallet_id')->nullable();
            $table->foreignId('customer_id')->nullable();
            $table->foreignId('transaction_id')->nullable();
            $table->foreignId('campaign_id')->nullable();
            $table->foreignId('custom_event_id')->nullable();
            $table->decimal('value')->default(0);
            $table->decimal('balance')->default(0);
            $table->dateTime('unlock_until')->nullable();
            $table->dateTime('expired_at')->nullable();
            $table->text('meta')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('points');
    }
};
