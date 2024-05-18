<?php

namespace App\Http\Controllers;

use App\Http\Requests\BackupScheduleRequest;
use App\Services\BackupScheduleService;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    protected $backupScheduleService;

    public function __construct(BackupScheduleService $backupScheduleService)
    {
        $this->backupScheduleService = $backupScheduleService;
    }

    public function index()
    {
        $backupSchedules = $this->backupScheduleService->getAll();
        return view('schedule.index', compact('backupSchedules'));
    }

    public function create()
    {
        return view('schedule.create');
    }

    public function store(BackupScheduleRequest $request)
    {
        $response = $this->backupScheduleService->create($request);
        return redirect()
            ->route('schedule.index')
            ->with($response);
    }

    public function show($id)
    {
        $backupSchedule = $this->backupScheduleService->findById($id);
        return view('schedule.show', compact('backupSchedule'));
    }

    public function edit($id)
    {
        $backupSchedule = $this->backupScheduleService->findById($id);
        return view('schedule.edit', compact('backupSchedule'));
    }

    public function update(BackupScheduleRequest $request, $id)
    {
        $response = $this->backupScheduleService->update($request, $id);
        return redirect()->back()->with($response);
    }

    public function destroy(Request $request)
    {
        $response = $this->backupScheduleService->delete($request->id);
        return redirect()
            ->route('schedule.index')
            ->with($response);
    }
}
