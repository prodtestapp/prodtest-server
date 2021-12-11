<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectCase extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'order_no',
    ];

    protected $casts = [
        'order_no' => 'integer',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function steps(): HasMany
    {
        return $this->hasMany(Step::class);
    }

    public function logs(): HasMany
    {
        return $this->hasMany(CaseLog::class, 'project_case_id');
    }

    public function latestLog(): HasOne
    {
        return $this->hasOne(CaseLog::class, 'project_case_id')->latestOfMany();
    }
}
