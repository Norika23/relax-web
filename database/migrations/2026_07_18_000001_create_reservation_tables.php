<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->id(); $table->string('name'); $table->string('email')->nullable();
            $table->string('phone')->nullable(); $table->string('timezone')->default('Asia/Tokyo');
            $table->unsignedSmallInteger('slot_interval_minutes')->default(30); $table->timestamps(); $table->softDeletes();
        });
        Schema::table('users', fn (Blueprint $table) => $table->foreignId('shop_id')->nullable()->after('id')->constrained()->nullOnDelete());
        Schema::create('services', function (Blueprint $table) {
            $table->id(); $table->foreignId('shop_id')->constrained()->cascadeOnDelete(); $table->string('name');
            $table->text('description')->nullable(); $table->unsignedInteger('price');
            $table->unsignedSmallInteger('duration_minutes'); $table->unsignedSmallInteger('buffer_minutes')->default(0);
            $table->boolean('is_active')->default(true); $table->unsignedSmallInteger('display_order')->default(0);
            $table->timestamps(); $table->softDeletes(); $table->index(['shop_id', 'is_active', 'display_order']);
        });
        Schema::create('staffs', function (Blueprint $table) {
            $table->id(); $table->foreignId('shop_id')->constrained()->cascadeOnDelete(); $table->string('name');
            $table->text('bio')->nullable(); $table->string('photo_path')->nullable(); $table->unsignedInteger('nomination_fee')->default(0);
            $table->boolean('is_active')->default(true); $table->boolean('can_accept_reservations')->default(true);
            $table->unsignedSmallInteger('display_order')->default(0); $table->timestamps(); $table->softDeletes();
            $table->index(['shop_id', 'is_active', 'display_order']);
        });
        Schema::create('staff_service', function (Blueprint $table) {
            $table->foreignId('staff_id')->constrained('staffs')->cascadeOnDelete();
            $table->foreignId('service_id')->constrained()->cascadeOnDelete();
            $table->primary(['staff_id', 'service_id']);
        });
        Schema::create('business_hours', function (Blueprint $table) {
            $table->id(); $table->foreignId('shop_id')->constrained()->cascadeOnDelete(); $table->unsignedTinyInteger('weekday');
            $table->time('opens_at')->nullable(); $table->time('closes_at')->nullable(); $table->boolean('is_closed')->default(false); $table->timestamps();
            $table->unique(['shop_id', 'weekday']);
        });
        Schema::create('staff_working_hours', function (Blueprint $table) {
            $table->id(); $table->foreignId('staff_id')->constrained('staffs')->cascadeOnDelete(); $table->unsignedTinyInteger('weekday');
            $table->time('starts_at')->nullable(); $table->time('ends_at')->nullable(); $table->boolean('is_day_off')->default(false); $table->timestamps();
            $table->unique(['staff_id', 'weekday']);
        });
        Schema::create('blocked_times', function (Blueprint $table) {
            $table->id(); $table->foreignId('shop_id')->constrained()->cascadeOnDelete();
            $table->foreignId('staff_id')->nullable()->constrained('staffs')->cascadeOnDelete(); $table->dateTime('starts_at'); $table->dateTime('ends_at');
            $table->string('reason')->nullable(); $table->timestamps(); $table->index(['shop_id', 'starts_at', 'ends_at']);
        });
        Schema::create('reservations', function (Blueprint $table) {
            $table->id(); $table->foreignId('shop_id')->constrained()->cascadeOnDelete();
            $table->foreignId('service_id')->constrained()->restrictOnDelete(); $table->foreignId('staff_id')->constrained('staffs')->restrictOnDelete();
            $table->string('customer_name'); $table->string('phone', 30); $table->string('email');
            $table->dateTime('starts_at'); $table->dateTime('ends_at'); $table->unsignedInteger('service_price');
            $table->unsignedInteger('nomination_fee')->default(0); $table->unsignedInteger('total_price');
            $table->string('status', 20)->default('confirmed'); $table->text('notes')->nullable();
            $table->string('source', 20)->default('web'); $table->uuid('cancellation_token')->unique(); $table->timestamps();
            $table->index(['staff_id', 'starts_at', 'ends_at', 'status']); $table->index(['shop_id', 'starts_at', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reservations'); Schema::dropIfExists('blocked_times'); Schema::dropIfExists('staff_working_hours');
        Schema::dropIfExists('business_hours'); Schema::dropIfExists('staff_service'); Schema::dropIfExists('staffs'); Schema::dropIfExists('services');
        Schema::table('users', fn (Blueprint $table) => $table->dropConstrainedForeignId('shop_id')); Schema::dropIfExists('shops');
    }
};
