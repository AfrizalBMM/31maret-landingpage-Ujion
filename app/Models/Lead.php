<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
  use HasFactory;

  protected $fillable = [
    'name',
    'phone',
    'email',
    'school_name',
    'role',
    'message',
    'cta_variant',
    'source',
    'ip_address',
    'user_agent',
  ];
}
