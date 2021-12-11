<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Step extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'key',
        'url',
        'headers',
        'body_type',
        'body',
        'expected_status',
        'use_validator',
        'validator_schema',
    ];

    protected $casts = [
        'headers' => 'object',
        'body' => 'object',
        'validator_schema' => 'object',
    ];

    public function case(): BelongsTo
    {
        return $this->belongsTo(ProjectCase::class);
    }
}
