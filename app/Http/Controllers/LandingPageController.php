<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLeadRequest;
use App\Models\LandingEvent;
use App\Models\Lead;
use App\Models\SiteSetting;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LandingPageController extends Controller
{
  public function index(): View
  {
    $brand = SiteSetting::getValue('brand', config('landing.brand'));

    return view('landing', [
      'brand' => $brand,
      'whatsappNumber' => SiteSetting::getValue('whatsapp_number', config('landing.whatsapp_number')),
      'heroHeadline' => SiteSetting::getValue('hero_headline', 'Tingkatkan Nilai Siswa Tanpa Menambah Beban Guru'),
      'heroSubtitle' => SiteSetting::getValue('hero_subheadline', 'Platform ujian digital yang membantu sekolah menghemat waktu, memberikan analisis instan, dan meningkatkan hasil belajar siswa.'),
      'problemTitle' => SiteSetting::getValue('problem_title', 'Tantangan Ujian di Sekolah Saat Ini'),
      'problemClose' => SiteSetting::getValue('problem_close', 'Kami menyelesaikan semua itu dalam satu platform.'),
      'benefitTitle' => SiteSetting::getValue('benefit_title', 'Hasil yang Akan Anda Dapatkan'),
      'solutionTitle' => SiteSetting::getValue('solution_title', 'Solusi Ujian Digital Terintegrasi'),
      'featuresTitle' => SiteSetting::getValue('features_title', 'Fitur Utama'),
      'howitTitle' => SiteSetting::getValue('howit_title', 'Cara Kerja'),
      'pricingTitle' => SiteSetting::getValue('pricing_title', 'Paket Terjangkau'),
      'pricingNote' => SiteSetting::getValue('pricing_note', 'Mulai dari Rp 15.000 / siswa / semester'),
      'finalCtaTitle' => SiteSetting::getValue('final_cta_title', 'Siap Meningkatkan Sistem Ujian Sekolah Anda?'),
      'finalCtaSubtitle' => SiteSetting::getValue('final_cta_subtitle', 'Mulai dari satu kelas terlebih dahulu.'),
    ]);
  }

  public function storeLead(StoreLeadRequest $request): RedirectResponse
  {
    $payload = $request->validated();

    $lead = Lead::create([
      'name' => $payload['name'],
      'phone' => $payload['phone'],
      'email' => $payload['email'] ?? null,
      'school_name' => $payload['school_name'],
      'role' => $payload['role'],
      'message' => $payload['message'] ?? null,
      'cta_variant' => $payload['cta_variant'],
      'source' => 'landing-page',
      'ip_address' => $request->ip(),
      'user_agent' => $request->userAgent(),
    ]);

    $message = rawurlencode(
      "Halo tim {$this->brandName()}, saya {$lead->name} dari {$lead->school_name}. " .
        "Saya tertarik {$lead->cta_variant}. Mohon info lanjutan."
    );

    $waUrl = "https://wa.me/{$this->sanitizeWhatsapp(config('landing.whatsapp_number'))}?text={$message}";

    return redirect($waUrl)->with('status', 'Lead berhasil tersimpan. Kami akan menghubungi Anda.');
  }

  public function trackEvent(Request $request): JsonResponse
  {
    $validated = $request->validate([
      'event_name' => ['required', 'string', 'max:60'],
      'event_category' => ['required', 'string', 'max:60'],
      'event_label' => ['nullable', 'string', 'max:120'],
      'event_value' => ['nullable', 'integer', 'min:0'],
      'metadata' => ['nullable', 'array'],
      'session_id' => ['nullable', 'string', 'max:120'],
    ]);

    LandingEvent::create([
      'event_name' => $validated['event_name'],
      'event_category' => $validated['event_category'],
      'event_label' => $validated['event_label'] ?? null,
      'event_value' => $validated['event_value'] ?? null,
      'metadata' => $validated['metadata'] ?? null,
      'session_id' => $validated['session_id'] ?? null,
      'ip_address' => $request->ip(),
      'user_agent' => $request->userAgent(),
    ]);

    return response()->json(['ok' => true]);
  }

  private function sanitizeWhatsapp(string $phone): string
  {
    return preg_replace('/\D+/', '', $phone) ?? '';
  }

  private function brandName(): string
  {
    return (string) SiteSetting::getValue('brand', config('landing.brand', 'Platform Ujian Digital'));
  }
}
