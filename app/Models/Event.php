<?php

namespace App\Models;

use App\Enums\EventStatus;
use App\Enums\Status;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /** @use HasFactory<\Database\Factories\EventFactory> */
    use HasFactory;
    public function getRouteKeyName()
    {
        return 'slug';
    }
    protected $fillable = [
        ' title',
        'description',
        'avatar',
        'video_url',
        'audio_url',
        'start_date',
        'start_time',
        'end_date',
        'end_time',
        'status',
        'is_live',
    ];
    protected $casts = [
        'start_date' => 'date',
        'start_time' => 'datetime:H:i',
        'end_date' => 'date',
        'end_time' => 'datetime:H:i',
        'is_live' => 'boolean',
        'status' => EventStatus::class,
    ];
    public function scopeScheduled(Builder $query): Builder
    {
        return $query->where('status', EventStatus::SCHEDULED->value);
    }

    public function scopeLive(Builder $query): Builder
    {
        return $query->where('is_live', true);
    }
}
