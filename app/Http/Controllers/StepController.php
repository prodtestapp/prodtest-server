<?php

namespace App\Http\Controllers;

use App\Http\Requests\Step\StoreStepRequest;
use App\Http\Requests\Step\UpdateStepRequest;
use App\Http\Requests\UpdateStepOrderRequest;
use App\Http\Resources\StepResource;
use App\Models\ProjectCase;
use App\Models\Step;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class StepController extends Controller
{
    public function index(ProjectCase $projectCase): AnonymousResourceCollection
    {
        $steps = $projectCase->steps()->orderBy('order_no')->get();

        return StepResource::collection($steps);
    }

    public function store(StoreStepRequest $request, ProjectCase $projectCase): StepResource
    {
        $step = $projectCase->steps()->create($request->validated());

        return StepResource::make($step);
    }

    public function show(Step $step): StepResource
    {
        return StepResource::make($step);
    }

    public function update(UpdateStepRequest $request, Step $step): StepResource
    {
        $step->update($request->validated());

        return StepResource::make($step);
    }

    public function destroy(Step $step): Response
    {
        $step->delete();

        return response()->noContent();
    }

    public function changeOrder(UpdateStepOrderRequest $request, Step $step): StepResource
    {
        if ($request->order_no < $step->order_no) {
            Step::where('project_case_id', $step->project_case_id)
                ->where('order_no', '>=', $request->order_no)
                ->where('order_no', '<', $step->order_no)
                ->increment('order_no');
        } else {
            Step::where('project_case_id', $step->project_case_id)
                ->where('order_no', '>', $step->order_no)
                ->where('order_no', '<=', $request->order_no)
                ->decrement('order_no');
        }

        $step->update(['order_no' => $request->order_no]);

        return StepResource::make($step);
    }
}
