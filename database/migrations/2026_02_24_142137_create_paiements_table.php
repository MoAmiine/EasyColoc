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
        Schema::create('paiements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('debtor_id')->constrained('users'); // debtor_id: int
            $table->foreignId('creditor_id')->constrained('users'); // creditor_id: int
            $table->foreignId('colocation_id')->constrained();
            $table->decimal('amount', 10, 2);
            $table->boolean('is_paid')->default(false); // is_paid: bool
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paiements');
    }
};
