<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();

            $table->text('name')->nullable();
            $table->text('description')->nullable();
            $table->text('issue_rules')->nullable();
            $table->text('use_rules')->nullable();

            $table->boolean('active')->default(true)->index();

            $table->string('type')->nullable()->index();
            $table->string('image')->nullable();

            $table->boolean('can_issue')->default(true)->index();
            $table->boolean('can_use')->default(true)->index();

            $table->dateTime('start_at')->nullable();
            $table->dateTime('end_at')->nullable();

            $table->dateTime('use_start_at')->nullable();
            $table->dateTime('use_end_at')->nullable();

            $table->integer('total')->nullable()->comment('总发放数量')->index();
            $table->integer('stock')->nullable()->comment('库存数量')->index();

            $table->text('settings')->nullable();

            $table->text('include_segments')->nullable();
            $table->text('exclude_segments')->nullable();

            $table->text('limits')->nullable();

            $table->timestamps();
        });

        Schema::create('customer_coupons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('coupon_id')->index()->index();
            $table->foreignId('customer_id')->index()->index();
            $table->string('status')->index();
            $table->string('code')->index();
            $table->dateTime('used_at')->nullable()->index();
            $table->dateTime('expires_at')->nullable()->index();
            $table->text('payload')->nullable();
            $table->timestamps();
        });

    }

};
