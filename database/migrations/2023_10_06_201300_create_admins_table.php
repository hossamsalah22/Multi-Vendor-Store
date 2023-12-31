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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string("slug")->unique();
            $table->string('password');
            $table->string('phone_number')->unique();
            $table->boolean('banned')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('language')->default('ar');
            $table->foreignId('store_id')->nullable()->constrained('stores')->nullOnDelete();
            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
