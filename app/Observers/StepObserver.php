<?php

namespace App\Observers;

use App\Models\Step;
use Illuminate\Support\Str;

class StepObserver
{
    public function creating(Step $step)
    {
        $stepCount = Step::where('project_case_id', $step->project_case_id)->count();
        $stepMaxOrderNo = Step::where('project_case_id', $step->project_case_id)->max('order_no');

        $step->key = Str::slug($step->name . '_' . $stepCount + 1, '_');
        $step->order_no = $stepMaxOrderNo + 1;
    }
}
