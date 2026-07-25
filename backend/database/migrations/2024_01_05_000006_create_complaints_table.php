<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('recipient_role'); // branch_manager, super_admin, accounts, marketing, management
            $table->string('subject');
            $table->text('message');
            $table->string('status')->default('pending'); // pending, in_progress, resolved, closed
            $table->string('priority')->default('normal'); // low, normal, high, urgent
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('complaints'); }
};
