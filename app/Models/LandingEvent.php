<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingEvent extends Model
{
  use HasFactory;

  protected $fillable = [
    'event_name',
    'event_category',
    'event_label',
    'event_value',
    'metadata',
    'session_id',
    'ip_address',
    'user_agent',
  ];

  protected $casts = [
    'metadata' => 'array',
  ];
}
