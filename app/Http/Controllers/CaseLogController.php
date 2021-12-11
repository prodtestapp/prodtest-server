<?php

namespace App\Http\Controllers;

use App\Http\Requests\CaseLog\StoreCaseLogRequest;
use App\Http\Resources\CaseLogResource;
use App\Models\CaseLog;
use App\Models\ProjectCase;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CaseLogController extends Controller
{
    public function index(ProjectCase $projectCase): AnonymousResourceCollection
    {
        $caseLogs = $projectCase->logs()->orderByDesc('created_at')->get();

        return CaseLogResource::collection($caseLogs);
    }

    public function store(StoreCaseLogRequest $request, ProjectCase $projectCase): CaseLogResource
    {
        $caseLog = $projectCase->logs()->create([
            'status' => $request->status,
            'failed_step_id' => $request->status ? null : $request->failed_step_id,
            'project_id' => $projectCase->project_id,
        ]);

        return CaseLogResource::make($caseLog);
    }

    public function show(CaseLog $caseLog): CaseLogResource
    {
        $caseLog->load('failedStep', 'project', 'case');

        return CaseLogResource::make($caseLog);
    }
}
