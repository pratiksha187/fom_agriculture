<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('channel_partners', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained()->cascadeOnDelete();
            $table->string('partner_type', 20);
            $table->string('agency_name', 150)->nullable();
            $table->string('mobile', 10)->unique();
            $table->string('city', 100);
            $table->string('experience', 20);
            $table->string('rera_number', 100)->nullable();
            $table->timestamp('terms_accepted_at');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('channel_partners');
    }
};
