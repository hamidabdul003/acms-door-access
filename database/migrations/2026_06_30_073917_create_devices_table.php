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
    Schema::create('devices', function (Blueprint $table) {

    $table->id();

    $table->uuid('uuid')->unique();

    $table->string('device_name');

    $table->string('location');

    $table->ipAddress('ip_address')->nullable();

    $table->string('mac_address')->nullable();

    $table->string('api_key',64)->unique();

    $table->string('firmware')->default('1.0.0');

    $table->integer('relay_time')->default(3);

    $table->boolean('status')->default(false);

    $table->timestamp('last_seen')->nullable();

    $table->text('description')->nullable();

    $table->timestamps();

   });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devices');
    }
};
