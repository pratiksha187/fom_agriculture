<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_admin')->default(false);
        });
        Schema::create('enquiries', function (Blueprint $table) {
            $table->id();
            $table->string('enquiry_type', 30)->index();
            $table->string('status', 20)->default('new')->index();
            $table->string('full_name', 100);
            $table->string('phone', 24);
            $table->string('email', 254)->nullable();
            $table->text('message')->nullable();
            $table->string('land_location', 250)->nullable();
            $table->string('survey_number', 100)->nullable();
            $table->timestamps();
        });
        Schema::create('enquiry_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('enquiry_id')->constrained()->cascadeOnDelete();
            $table->string('category', 60);
            $table->string('label');
            $table->string('path');
            $table->text('original_name');
            $table->unsignedBigInteger('size');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('enquiry_documents');
        Schema::dropIfExists('enquiries');
        Schema::table('users', fn (Blueprint $table) => $table->dropColumn('is_admin'));
    }
};
