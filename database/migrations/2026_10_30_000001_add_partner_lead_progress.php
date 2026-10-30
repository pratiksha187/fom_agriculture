<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('partner_leads', function (Blueprint $table) {
            $table->string('progress_status', 20)->nullable()->index();
        });
        Schema::create('partner_lead_status_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('partner_lead_id')->constrained()->cascadeOnDelete();
            $table->foreignId('changed_by')->nullable()->constrained('users')->nullOnDelete();
            $table->string('from_status', 25)->nullable();
            $table->string('to_status', 25);
            $table->dateTime('visit_at')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('partner_lead_status_histories');
        Schema::table('partner_leads', function (Blueprint $table) {
            $table->dropIndex(['progress_status']);
            $table->dropColumn('progress_status');
        });
    }
};
