<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    const STATUS_UPCOMING = '開催予定';
    const STATUS_ONGOING = '開催中';
    const STATUS_ENDED = '終了';

    protected $fillable = [
        'title',
        'description',
        'image_url',
        'start_date',
        'end_date',
        'category',
        'location',
        'status'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function isOngoing()
    {
        $now = now();
        return $this->start_date <= $now && $this->end_date >= $now;
    }

    public function hasEnded()
    {
        return $this->end_date < now();
    }

    public function isUpcoming()
    {
        return $this->start_date > now();
    }
}
