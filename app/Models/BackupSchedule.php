<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BackupSchedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'schedule_name', 'backup_server', 'backup_method', 'backup_type', 'enable_pitr',
        'backup_per_file', 'storage_name', 'storage_directory', 'retention_policy_type',
        'backup_name', 'use_compression', 'use_encryption', 'backup_schedule_frequency'
    ];


    public function getScheduleTimeAttribute()
    {
        return $this->created_at->format('\A\t h:i A');
    }

}
