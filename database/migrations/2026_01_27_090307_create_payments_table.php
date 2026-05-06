<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    // -amount
    // -status => ['processing','complete','canceled']
    // -payment_gateway => ['Paypal','Stripe','huperpay']
    // -transaction_number => unique()
    // -user_id
    // -case_id

    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('amount');
            $table->enum('status', ['processing', 'completed', 'canceled'])->default('processing');
            $table->enum('payment_gateway', ['paypal', 'stripe', 'huperpay'])->default('stripe');
            $table->string('transaction_number');
            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();
            $table->foreignId('campaign_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
