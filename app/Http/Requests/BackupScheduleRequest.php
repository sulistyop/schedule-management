<?php

namespace App\Http\Requests;

use App\Models\BackupSchedule;
use Illuminate\Foundation\Http\FormRequest;

class BackupScheduleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Adjust this according to your authorization logic
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $schedule = BackupSchedule::where('id', $this->route('schedule'))->first();
        $id = $schedule?->id;
        $uniqueRule = $id ? 'unique:backup_schedules,schedule_name,' . $id : 'unique:backup_schedules,schedule_name';

        return [
            'schedule_name' => 'required|' . $uniqueRule,
            'backup_server' => 'required',
            'backup_method' => 'required',
            'backup_type' => 'required',
            'storage_name' => 'required',
            'storage_directory' => [
                'required',
                'regex:/^(\/?[a-zA-Z0-9_\-]+)+\/?$/',
            ],
            'retention_policy_type' => 'required',
            'backup_name' => 'required',
        ];
    }
}
