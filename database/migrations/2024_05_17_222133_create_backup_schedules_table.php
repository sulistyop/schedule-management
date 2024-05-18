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
        Schema::create('backup_schedules', function (Blueprint $table) {
            $table->id();
            $table->string('schedule_name')->nullable(false);
            $table->string('backup_server')->nullable(false);
            $table->enum('backup_method',['full', 'incremental'])->default('full');
            $table->enum('backup_type',['file', 'image'])->default('file');
            $table->boolean('enable_pitr')->default(false);
            $table->boolean('backup_per_file')->default(false);
            $table->string('storage_name')->nullable(false);
            $table->string('storage_directory')->nullable(false);
            $table->string('retention_policy_type')->nullable(false);
            $table->string('backup_name')->nullable(false);
            $table->boolean('use_compression')->default(false);
            $table->boolean('use_encryption')->default(false);
            $table->enum('backup_schedule_frequency',['hourly', 'daily', 'weekly', 'monthly'])->default('daily');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('backup_schedules');
    }
};
