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
    Schema::create('cards', function (Blueprint $table) {

        $table->id();

        $table->string('uid',32)->unique();

        $table->string('owner_name');

        $table->enum('owner_type',[
            'Guru',
            'Siswa',
            'Staff',
            'Admin',
            'Guest'
        ]);

        $table->boolean('status')->default(true);

        $table->date('expired_at')->nullable();

        $table->timestamps();

    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};
