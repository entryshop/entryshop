<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDomainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('domains', function (Blueprint $table) {
            $table->id();
            $table->string('domain', 255)->unique();
            $table->string('tenant_id');
            $table->unsignedTinyInteger('is_primary')->default(false);
            $table->unsignedTinyInteger('is_fallback')->default(false);
            $table->string('certificate_status', 64)->nullable();
            $table->timestamps();
        });
    }
}
