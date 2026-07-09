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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_id')->constrained()->cascadeOnDelete();
            $table->string('invoice_number');
            $table->date('invoice_date');
            $table->decimal('subtotal', 10, 2);
            $table->decimal('tax', 10,2);
            $table->decimal('total', 10, 2);
            $table->enum('status', ['Unpaid', 'Paid'])->default('Unpaid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
