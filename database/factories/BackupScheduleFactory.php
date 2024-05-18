<?php

namespace Database\Factories;

use App\Models\BackupSchedule;
use Illuminate\Database\Eloquent\Factories\Factory;

class BackupScheduleFactory extends Factory
{
    protected $model = BackupSchedule::class;

    public function definition()
    {
        return [
            'schedule_name' => $this->faker->unique()->word,
            'backup_server' => $this->faker->word,
            'backup_method' => $this->faker->word,
            'backup_type' => $this->faker->word,
            'enable_pitr' => $this->faker->boolean,
            'backup_per_file' => $this->faker->boolean,
            'storage_name' => $this->faker->word,
            'storage_directory' => $this->faker->word,
            'retention_policy_type' => $this->faker->word,
            'backup_name' => $this->faker->word,
            'use_compression' => $this->faker->boolean,
            'use_encryption' => $this->faker->boolean,
            'backup_schedule_frequency' => $this->faker->word,
        ];
    }
}
