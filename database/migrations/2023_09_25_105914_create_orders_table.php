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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->enum('status', ['pending', 'processing', 'completed', 'delivering', 'declined', 'cancelled'])
                ->default('pending');
            $table->enum('payment_status', ['pending', 'paid', 'failed'])
                ->default('pending');
            $table->enum('payment_method', ['cod', 'paypal', 'stripe', 'razorpay', 'paystack', 'flutterwave'])
                ->default('cod');
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('store_id')->constrained('stores');
            $table->float('shipping')->default(0);
            $table->float('tax')->default(0);
            $table->float('discount')->default(0);
            $table->float('total')->default(0);
            $table->softDeletes();
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
