<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('urls', function (Blueprint $table) {
            $table->id()->primary();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->text('main_url');
            $table->string('shortened_url')->unique();
            $table->unsignedBigInteger('visits')->default(0);
            $table->boolean('send_email')->default(0);
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('urls');
    }
};
