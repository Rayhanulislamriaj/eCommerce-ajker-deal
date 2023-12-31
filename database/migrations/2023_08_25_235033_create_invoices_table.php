<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->integer('vendor_id');
            $table->integer('subtotal');
            $table->string('coupon_name')->nullable();
            $table->integer('coupon_discount')->default(0);
            $table->integer('coupon_discount_amount')->default(0);
            $table->integer('total');
            $table->integer('address_id');
            $table->integer('delivery_charge');
            $table->string('payment_option');
            $table->string('payment_status')->default('unpaid');
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