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
        Schema::create('mdas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamps();
        });


        // Tenders table
        Schema::create('tenders', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->enum('category', ['goods', 'works', 'services']);
            $table->enum('advertisement_type', ['local', 'international']);
            $table->dateTime('opening_date');
            $table->dateTime('closing_date');
            $table->unsignedInteger('slot_count')->nullable()->comment('Max slots for bidding');
            $table->enum('status', ['draft', 'open', 'closed', 'awarded'])->default('draft');
            $table->foreignId('created_by')->constrained('users')->cascadeOnDelete();
            $table->timestamps();
            $table->index('closing_date');
        });

        // Bids table
        Schema::create('bids', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tender_id')->constrained()->cascadeOnDelete();
            $table->foreignId('vendor_id')->constrained('users')->cascadeOnDelete();
            $table->decimal('amount', 14, 2)->comment('Bid amount in NGN');
            $table->unsignedInteger('slots_requested')->default(1);
            $table->date('delivery_date');
            $table->enum('status', ['submitted', 'under_review', 'disqualified', 'awarded'])->default('submitted');
            $table->timestamp('submitted_at')->useCurrent();
            $table->timestamps();
            $table->unique(['tender_id', 'vendor_id']); // Prevent duplicate bids
        });

        // Bid Evaluations table
        Schema::create('bid_evaluations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bid_id')->constrained()->cascadeOnDelete();
            $table->foreignId('evaluator_id')->constrained('users')->cascadeOnDelete();
            $table->unsignedTinyInteger('technical_score')->default(0);
            $table->unsignedTinyInteger('financial_score')->default(0);
            $table->unsignedTinyInteger('total_score')->virtualAs('technical_score + financial_score');
            $table->text('comments')->nullable();
            $table->timestamps();
        });

        // Documents table
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('tender_id')->nullable()->constrained()->nullOnDelete();
            $table->enum('doc_type', [
                'cac', 'tax_clearance', 'audit_report', 'project_evidence',
                'no_objection', 'procurement_plan', 'bid_evaluation', 'award_letter'
            ]);
            $table->string('file_path');
            $table->string('original_name');
            $table->string('mime_type');
            $table->unsignedInteger('size')->comment('Size in bytes');
            $table->string('checksum')->comment('File hash for integrity');
            $table->boolean('is_verified')->default(false);
            $table->timestamps();
        });

        // Audit Logs table
        Schema::create('audit_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('action', 50)->comment('e.g., login, bid_submission');
            $table->text('description');
            $table->ipAddress('ip_address');
            $table->text('user_agent');
            $table->json('metadata')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audit_logs');
        Schema::dropIfExists('documents');
        Schema::dropIfExists('bid_evaluations');
        Schema::dropIfExists('bids');
        Schema::dropIfExists('tenders');
        Schema::dropIfExists('mdas');
    }
};
