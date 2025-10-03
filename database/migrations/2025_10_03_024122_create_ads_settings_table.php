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
        Schema::create('ads_settings', function (Blueprint $table) {
            $table->id();
            $table->string('client_id')->nullable(); // contoh: ca-pub-1234567890123456
            $table->string('slot_id')->nullable();   // contoh: 9876543210
            $table->string('ad_format')->default('auto'); // default auto
            $table->boolean('responsive')->default(true); // true = responsive
            $table->text('custom_style')->nullable(); // untuk style tambahan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ads_settings');
    }
};
