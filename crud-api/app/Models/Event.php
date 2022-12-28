<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Events\CreatingEvent;

class Event extends Model
{
    use HasFactory;
    public $timestamps = true;
    public $incrementing = false;
	protected $table = 'event';
    // protected $casts = [
    //     'id' => 'string',
    // ];

    // protected $dispatchesEvents = [
    //     'created' => CreatingEvent::class,
    // ];
}
