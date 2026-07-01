<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('card_permissions', function (Blueprint $table) {

            $table->foreignId('card_id')
                ->after('id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('device_id')
                ->after('card_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->unique([
                'card_id',
                'device_id'
            ]);

        });
    }

    public function down(): void
    {
        Schema::table('card_permissions', function (Blueprint $table) {

            $table->dropUnique([
                'card_id',
                'device_id'
            ]);

            $table->dropConstrainedForeignId('device_id');

            $table->dropConstrainedForeignId('card_id');

        });
    }
};
