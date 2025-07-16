<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            if (!Schema::hasColumn('blogs', 'author')) {
                $table->string('author')->nullable();
            }
            if (!Schema::hasColumn('blogs', 'image')) {
                $table->string('image')->nullable();
            }
            if (!Schema::hasColumn('blogs', 'published_at')) {
                $table->date('published_at')->nullable();
            }
            if (!Schema::hasColumn('blogs', 'status')) {
                $table->boolean('status')->default(true);
            }
            if (!Schema::hasColumn('blogs', 'category_id')) {
                $table->foreignId('category_id')->nullable()->constrained()->onDelete('set null');
            }
        });
    }

    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn(['author', 'image', 'published_at', 'status']);
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });
    }
};
