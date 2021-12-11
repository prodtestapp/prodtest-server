<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectCase\StoreProjectCaseRequest;
use App\Http\Requests\ProjectCase\UpdateProjectCaseRequest;
use App\Http\Resources\ProjectCaseResource;
use App\Models\Project;
use App\Models\ProjectCase;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class ProjectCaseController extends Controller
{
    public function index(Project $project): AnonymousResourceCollection
    {
        $cases = $project->cases;

        return ProjectCaseResource::collection($cases);
    }

    public function store(StoreProjectCaseRequest $request, Project $project): ProjectCaseResource
    {
        $case = $project->cases()->create(array_merge($request->validated(), [
            'order_no' => $project->cases()->max('order_no') + 1,
        ]));

        return ProjectCaseResource::make($case);
    }

    public function show(ProjectCase $projectCase): ProjectCaseResource
    {
        $projectCase->load('project');

        return ProjectCaseResource::make($projectCase);
    }

    public function update(UpdateProjectCaseRequest $request, ProjectCase $projectCase): ProjectCaseResource
    {
        $projectCase->update($request->only('name'));

        if ($request->has('order_no')) {
            ProjectCase::where('project_id', $projectCase->project_id)
                ->where('order_no', '=', $request->order_no)
                ->update(['order_no' => $projectCase->order_no]);

            $projectCase->update([
                'order_no' => $request->order_no,
            ]);
        }

        return ProjectCaseResource::make($projectCase);
    }

    public function destroy(ProjectCase $projectCase): Response
    {
        $projectCase->delete();

        return response()->noContent();
    }
}
