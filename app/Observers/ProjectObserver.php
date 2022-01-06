<?php

namespace App\Observers;

use App\Enums\ProjectBackgroundColor;
use App\Models\Project;

class ProjectObserver
{
    /**
     * @throws \Exception
     */
    public function creating(Project $project): void
    {
        $project->background_color = array_column(ProjectBackgroundColor::cases(), 'value')[random_int(0, count(ProjectBackgroundColor::cases()) - 1)];
    }
}
