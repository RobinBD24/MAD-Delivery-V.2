<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('table_layouts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('branch_id')->constrained('branches')->onDelete('cascade');
            $table->string('table_name');
            $table->string('table_identifier')->nullable(); // unique ID/number
            $table->integer('seat_capacity')->default(4);
            $table->enum('status', ['available', 'occupied', 'out_of_service'])->default('available');
            $table->string('location_description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('table_layouts');
    }
};
