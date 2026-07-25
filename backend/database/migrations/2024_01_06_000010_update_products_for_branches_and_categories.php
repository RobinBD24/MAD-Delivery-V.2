<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->foreignId('branch_id')->nullable()->constrained('branches')->onDelete('set null')->after('category');
            $table->foreignId('category_id')->nullable()->constrained('categories')->onDelete('set null')->after('category');
            $table->string('brand_tag')->nullable()->after('category');
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['branch_id']);
            $table->dropForeign(['category_id']);
            $table->dropColumn(['branch_id', 'category_id', 'brand_tag']);
        });
    }
};
