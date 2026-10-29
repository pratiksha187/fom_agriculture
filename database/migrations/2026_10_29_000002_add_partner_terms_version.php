<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('channel_partners', function (Blueprint $table) {
            $table->string('terms_version', 64)->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('channel_partners', fn (Blueprint $table) => $table->dropColumn('terms_version'));
    }
};
