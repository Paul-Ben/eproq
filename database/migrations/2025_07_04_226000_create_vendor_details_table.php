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
        Schema::create('vendor_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('company_name');
            $table->string('phone_number');
            $table->string('tax_identification_number');
            $table->string('cac_registration_number');
            $table->string('business_type');
            $table->string('user_type');
            $table->string('certificate_of_incorporation')->nullable();
            $table->string('tin_certificate')->nullable();
            $table->string('company_profile')->nullable();
            $table->string('past_project_evidence')->nullable();
            $table->string('other_document')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendor_details');
    }
};