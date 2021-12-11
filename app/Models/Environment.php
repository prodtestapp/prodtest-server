<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Environment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'data',
    ];

    protected $casts = [
        'data' => 'object',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
