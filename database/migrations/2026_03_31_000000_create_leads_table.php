<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up(): void
  {
    Schema::create('leads', function (Blueprint $table): void {
      $table->id();
      $table->string('name', 120);
      $table->string('phone', 30);
      $table->string('email', 120)->nullable();
      $table->string('school_name', 160);
      $table->string('role', 80);
      $table->text('message')->nullable();
      $table->string('cta_variant', 60);
      $table->string('source', 40)->default('landing-page');
      $table->ipAddress('ip_address')->nullable();
      $table->text('user_agent')->nullable();
      $table->timestamps();
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('leads');
  }
};
