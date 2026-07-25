<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('riders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('vehicle_type')->nullable(); // bike, car
            $table->string('license_plate')->nullable();
            $table->string('status')->default('offline'); // online, offline, on_duty
            $table->decimal('commission_rate', 5, 2)->default(0);
            $table->decimal('available_balance', 10, 2)->default(0);
            $table->text('current_location')->nullable(); // lat,lng
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('riders'); }
};
