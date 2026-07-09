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
        Schema::create('members', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('phone');
            $table->text('address');

            $table->foreignId('membership_id')
                 ->constrained('memberships')
                 ->onDelete('cascade');

            $table->date('join_date');
            $table->enum('status', ['active', 'suspend'])->default('suspend');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
