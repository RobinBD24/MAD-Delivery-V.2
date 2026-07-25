<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade');
            $table->foreignId('rider_id')->nullable()->constrained('riders')->onDelete('set null');
            $table->string('status')->default('pending'); // assigned, picked_up, on_the_way, delivered, delayed, cancelled
            $table->string('delivery_zone');
            $table->text('delivery_address');
            $table->timestamp('assigned_at')->nullable();
            $table->timestamp('picked_up_at')->nullable();
            $table->timestamp('delivered_at')->nullable();
            $table->integer('travel_distance_meters')->default(0);
            $table->text('route_history')->nullable(); // JSON
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('deliveries'); }
};
