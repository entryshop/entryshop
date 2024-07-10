<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('key')->nullable();
            $table->string('secret')->nullable();
            $table->boolean('is_admin')->default(true);
            $table->boolean('is_customer')->default(true);
            $table->text('scope')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }
};
