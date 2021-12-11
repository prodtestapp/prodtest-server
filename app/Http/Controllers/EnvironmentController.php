<?php

namespace App\Http\Controllers;

use App\Http\Requests\Environment\StoreEnvironmentRequest;
use App\Http\Requests\Environment\UpdateEnvironmentRequest;
use App\Http\Resources\EnvironmentResource;
use App\Models\Environment;
use App\Models\Project;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class EnvironmentController extends Controller
{
    public function index(Project $project): AnonymousResourceCollection
    {
        $environments = $project->environments;

        return EnvironmentResource::collection($environments);
    }

    public function store(StoreEnvironmentRequest $request, Project $project): EnvironmentResource
    {
        $environment = $project->environments()->create($request->validated());

        return EnvironmentResource::make($environment);
    }

    public function show(Environment $environment): EnvironmentResource
    {
        return EnvironmentResource::make($environment);
    }

    public function update(UpdateEnvironmentRequest $request, Environment $environment): EnvironmentResource
    {
        $environment->update($request->validated());

        return EnvironmentResource::make($environment);
    }

    public function destroy(Environment $environment): Response
    {
        $environment->delete();

        return response()->noContent();
    }
}
