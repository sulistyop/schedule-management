<?php

namespace Database\Seeders;

use App\Models\BackupSchedule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BackupScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BackupSchedule::factory()
            ->count(4)
            ->sequence(
                [
                    'schedule_name' => 'Daily Backup 1',
                    'backup_method' => 'full',
                    'backup_type' => 'file',
                    'retention_policy_type' => 'Policy 1',
                    'backup_schedule_frequency' => 'daily',
                ],
                [
                    'schedule_name' => 'Weekly Backup 1',
                    'backup_method' => 'incremental',
                    'backup_type' => 'image',
                    'retention_policy_type' => 'Policy 2',
                    'backup_schedule_frequency' => 'weekly',
                ],
                [
                    'schedule_name' => 'Monthly Backup 1',
                    'backup_method' => 'full',
                    'backup_type' => 'file',
                    'retention_policy_type' => 'Policy 3',
                    'backup_schedule_frequency' => 'monthly',
                ],
                [
                    'schedule_name' => 'Hourly Backup 1',
                    'backup_method' => 'incremental',
                    'backup_type' => 'image',
                    'retention_policy_type' => 'Policy 4',
                    'backup_schedule_frequency' => 'hourly',
                ]
            )
            ->create([
                'backup_server' => '192.168.0.1',
                'enable_pitr' => true,
                'backup_per_file' => true,
                'storage_name' => 'Storage 1',
                'storage_directory' => 'Directory 1',
                'backup_name' => 'Backup 1',
                'use_compression' => true,
                'use_encryption' => true,
            ]);
    }
}
