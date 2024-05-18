<?php

namespace App\Services;

use App\Models\BackupSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BackupScheduleService
{
    public function getAll()
    {
        return BackupSchedule::all();
    }

    public function findById($id)
    {
        return BackupSchedule::find($id);
    }

    public function create(Request $request)
    {

        $data = $this->formatData($request);

        DB::beginTransaction();
        try {
            BackupSchedule::create($data);
            DB::commit();
            return [
                'status' => 'success',
                'title' => 'Create Schedule Success',
                'message' => 'Backup schedule created successfully'
            ];
        } catch (\Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage() . ' ' . $e->getTraceAsString());
            return [
                'status' => 'error',
                'title' => 'Create Schedule Failed',
                'message' => 'Failed to create backup schedule'
            ];
        }
    }

    public function update(Request $request, $id)
    {
        $data = $this->formatData($request);

        DB::beginTransaction();
        try {
            BackupSchedule::find($id)->update($data);
            DB::commit();
            return [
                'status' => 'success',
                'title' => 'Update Schedule Success',
                'message' => 'Backup schedule updated successfully'
            ];
        } catch (\Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage() . ' ' . $e->getTraceAsString());
            return [
                'status' => 'error',
                'title' => 'Update Schedule Failed',
                'message' => 'Failed to update backup schedule'
            ];
        }
    }

    public function delete($id)
    {
        try {
            BackupSchedule::destroy($id);
            return [
                'status' => 'success',
                'title' => 'Delete Schedule Success',
                'message' => 'Backup schedule deleted successfully'
            ];
        } catch (\Exception $e) {
            Log::info($e->getMessage() . ' ' . $e->getTraceAsString());
            return [
                'status' => 'error',
                'title' => 'Delete Schedule Failed',
                'message' => 'Failed to delete backup schedule'
            ];
        }
    }

    private function formatData(Request $request)
    {
        return $request->merge([
            'enable_pitr' => $request->enable_pitr ? true : false,
            'backup_per_file' => $request->backup_per_file ? true : false,
            'use_compression' => $request->use_compression ? true : false,
            'use_encryption' => $request->use_encryption ? true : false,
        ])->all();
    }
}
