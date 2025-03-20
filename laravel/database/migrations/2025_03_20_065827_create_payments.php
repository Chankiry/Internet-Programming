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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->timestamp('payment_date')->nullable(false); // TIMESTAMP, NOT NULL
            $table->string('payment_method', 100)->nullable(false); // VARCHAR(100), NOT NULL
            $table->decimal('amount', 10, 2)->nullable(false); // Decimal(10,2), NOT NULL
            $table->unsignedBigInteger('order_id')->nullable(false);
            $table->unsignedBigInteger('customer_id')->nullable(false);

            // Foreign Keys
            $table->foreign('order_id')->references('id')->on('orders')
                ->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')
                ->onDelete('cascade');
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
