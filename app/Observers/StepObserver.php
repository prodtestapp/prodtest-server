<?php

namespace App\Observers;

use App\Models\ProjectCase;
use App\Models\Step;
use Illuminate\Support\Str;

class StepObserver
{
    public function creating(Step $step)
    {
        $stepCount = Step::where('project_case_id', $step->project_case_id)->count();
        $stepMaxOrderNo = Step::where('project_case_id', $step->project_case_id)->max('order_no');

        $projectCase = ProjectCase::findOrFail($step->project_case_id);

        $step->key = Str::slug($projectCase->name . '_' . $stepCount + 1, '_');
        $step->order_no = $stepMaxOrderNo + 1;
    }
}
