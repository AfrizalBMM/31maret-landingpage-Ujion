<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
  use HasFactory;

  protected $fillable = [
    'key',
    'value',
  ];

  public static function getValue(string $key, ?string $default = null): ?string
  {
    try {
      $value = static::query()->where('key', $key)->value('value');
      return $value ?? $default;
    } catch (\Exception $e) {
      // Table doesn't exist yet (e.g., during tests), return default
      return $default;
    }
  }

  public static function setValue(string $key, ?string $value): void
  {
    static::query()->updateOrCreate([
      'key' => $key,
    ], [
      'value' => $value,
    ]);
  }
}
