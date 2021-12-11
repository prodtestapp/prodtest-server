<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class CaseLog extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'project_case_id',
        'project_id',
        'failed_step_id',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function case(): BelongsTo
    {
        return $this->belongsTo(ProjectCase::class, 'project_case_id');
    }

    public function failedStep(): BelongsTo
    {
        return $this->belongsTo(Step::class, 'failed_step_id');
    }
}
