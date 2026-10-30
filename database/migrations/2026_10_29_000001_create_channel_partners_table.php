<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // A previous MySQL attempt may have created the table without recording
        // the migration. Reuse it only when the original columns are present.
        if (Schema::hasTable('channel_partners')) {
            if (! Schema::hasColumns('channel_partners', [
                'id', 'user_id', 'partner_type', 'agency_name', 'mobile', 'city',
                'experience', 'rera_number', 'terms_accepted_at', 'created_at', 'updated_at',
            ])) {
                throw new RuntimeException('The existing channel_partners table is missing required columns. Inspect its schema before retrying this migration.');
            }

            return;
        }

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
