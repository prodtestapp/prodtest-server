<?php

namespace App\Http\Controllers;

use App\Http\Requests\Project\StoreProjectRequest;
use App\Http\Requests\Project\UpdateProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class ProjectController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $projects = Project::withCount('cases')->with('latestLog')->orderBy('created_at')->get();

        return ProjectResource::collection($projects);
    }

    public function store(StoreProjectRequest $request): ProjectResource
    {
        $project = Project::create($request->validated());

        $project->environments()->create([
            'name' => 'Default',
        ]);

        $project->load('environments');
        $project->loadCount('cases');

        return ProjectResource::make($project);
    }

    public function show(Project $project): ProjectResource
    {
        $project->load([
            'cases' => function ($query) {
                $query->orderBy('order_no')->withCount('steps');
            },
            'cases.latestLog',
        ]);

        $project->loadCount('cases');

        return ProjectResource::make($project);
    }

    public function update(UpdateProjectRequest $request, Project $project): ProjectResource
    {
        $project->update($request->validated());

        $project->loadCount('cases');

        return ProjectResource::make($project);
    }

    public function destroy(Project $project): Response
    {
        $project->delete();

        return response()->noContent();
    }
}
