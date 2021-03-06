<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'background_color',
    ];

    public function cases(): HasMany
    {
        return $this->hasMany(ProjectCase::class);
    }

    public function environments(): HasMany
    {
        return $this->hasMany(Environment::class);
    }

    public function latestLog(): HasOne
    {
        return $this->hasOne(CaseLog::class, 'project_id')->latestOfMany();
    }
}
