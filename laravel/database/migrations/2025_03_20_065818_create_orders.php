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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->timestamp('order_date')->nullable(false); // TIMESTAMP, NOT NULL
            $table->decimal('total_price', 10, 2)->nullable(false); // Decimal(10,2), NOT NULL
            $table->unsignedBigInteger('customer_id')->nullable(false);

            // Foreign Key
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
        Schema::dropIfExists('orders');
    }
};
