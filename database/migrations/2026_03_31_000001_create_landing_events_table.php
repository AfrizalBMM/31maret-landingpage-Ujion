<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up(): void
  {
    Schema::create('landing_events', function (Blueprint $table): void {
      $table->id();
      $table->string('event_name', 60);
      $table->string('event_category', 60);
      $table->string('event_label', 120)->nullable();
      $table->unsignedInteger('event_value')->nullable();
      $table->json('metadata')->nullable();
      $table->string('session_id', 120)->nullable();
      $table->ipAddress('ip_address')->nullable();
      $table->text('user_agent')->nullable();
      $table->timestamps();
      $table->index(['event_name', 'created_at']);
      $table->index('session_id');
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('landing_events');
  }
};
