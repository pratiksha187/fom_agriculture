<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('channel_partners', function (Blueprint $table) {
            $table->string('status', 20)->default('pending')->index();
            $table->timestamp('approved_at')->nullable();
            $table->foreignId('approved_by')->nullable()->constrained('users')->nullOnDelete();
        });
        Schema::create('partner_leads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('channel_partner_id')->constrained()->cascadeOnDelete();
            $table->string('buyer_name', 100);
            $table->string('phone', 10)->index();
            $table->string('email', 254)->nullable();
            $table->string('city', 100)->nullable();
            $table->text('requirements')->nullable();
            $table->string('status', 25)->default('new');
            $table->timestamp('buyer_consent_at');
            $table->timestamps();
            $table->unique(['channel_partner_id', 'phone']);
        });
        Schema::create('partner_site_visits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('partner_lead_id')->constrained()->cascadeOnDelete();
            $table->dateTime('scheduled_at');
            $table->string('status', 20)->default('requested');
            $table->text('notes')->nullable();
            $table->foreignId('verified_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
        Schema::create('partner_bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('partner_lead_id')->unique()->constrained()->cascadeOnDelete();
            $table->string('reference', 100)->unique();
            $table->string('plot', 100);
            $table->decimal('sale_amount', 14, 2);
            $table->string('status', 20)->default('reserved');
            $table->decimal('commission_amount', 14, 2)->nullable();
            $table->string('commission_status', 20)->default('not_eligible');
            $table->string('payment_reference', 150)->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('partner_bookings');
        Schema::dropIfExists('partner_site_visits');
        Schema::dropIfExists('partner_leads');
        Schema::table('channel_partners', function (Blueprint $table) {
            $table->dropConstrainedForeignId('approved_by');
            $table->dropColumn(['status', 'approved_at']);
        });
    }
};
