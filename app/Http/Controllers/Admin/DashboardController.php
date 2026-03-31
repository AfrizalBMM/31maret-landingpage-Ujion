<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LandingEvent;
use App\Models\Lead;
use App\Models\SiteSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
  public function index(): View
  {
    return view('admin.dashboard', [
      'stats' => [
        'total_leads' => Lead::query()->count(),
        'today_leads' => Lead::query()->whereDate('created_at', now()->toDateString())->count(),
        'total_events' => LandingEvent::query()->count(),
        'cta_clicks' => LandingEvent::query()->where('event_name', 'cta_click')->count(),
      ],
      'recentLeads' => Lead::query()->latest()->limit(8)->get(),
    ]);
  }

  public function leads(): View
  {
    return view('admin.leads.index', [
      'leads' => Lead::query()->latest()->paginate(15),
    ]);
  }

  public function settings(): View
  {
    return view('admin.settings.edit', [
      'settings' => [
        'brand' => SiteSetting::getValue('brand', config('landing.brand')),
        'whatsapp_number' => SiteSetting::getValue('whatsapp_number', config('landing.whatsapp_number')),
        'hero_headline' => SiteSetting::getValue('hero_headline', 'Tingkatkan Nilai Siswa Tanpa Menambah Beban Guru'),
        'hero_subheadline' => SiteSetting::getValue('hero_subheadline', 'Platform ujian digital yang membantu sekolah menghemat waktu, memberikan analisis instan, dan meningkatkan hasil belajar siswa.'),
        'problem_title' => SiteSetting::getValue('problem_title', 'Tantangan Ujian di Sekolah Saat Ini'),
        'problem_close' => SiteSetting::getValue('problem_close', 'Kami menyelesaikan semua itu dalam satu platform.'),
        'benefit_title' => SiteSetting::getValue('benefit_title', 'Hasil yang Akan Anda Dapatkan'),
        'solution_title' => SiteSetting::getValue('solution_title', 'Solusi Ujian Digital Terintegrasi'),
        'features_title' => SiteSetting::getValue('features_title', 'Fitur Utama'),
        'howit_title' => SiteSetting::getValue('howit_title', 'Cara Kerja'),
        'pricing_title' => SiteSetting::getValue('pricing_title', 'Paket Terjangkau'),
        'pricing_note' => SiteSetting::getValue('pricing_note', 'Mulai dari Rp 15.000 / siswa / semester'),
        'final_cta_title' => SiteSetting::getValue('final_cta_title', 'Siap Meningkatkan Sistem Ujian Sekolah Anda?'),
        'final_cta_subtitle' => SiteSetting::getValue('final_cta_subtitle', 'Mulai dari satu kelas terlebih dahulu.'),
      ],
    ]);
  }

  public function updateSettings(Request $request): RedirectResponse
  {
    $payload = $request->validate([
      'brand' => ['required', 'string', 'max:100'],
      'whatsapp_number' => ['required', 'string', 'max:30'],
      'hero_headline' => ['required', 'string', 'max:180'],
      'hero_subheadline' => ['required', 'string', 'max:260'],
      'problem_title' => ['required', 'string', 'max:150'],
      'problem_close' => ['required', 'string', 'max:180'],
      'benefit_title' => ['required', 'string', 'max:150'],
      'solution_title' => ['required', 'string', 'max:150'],
      'features_title' => ['required', 'string', 'max:100'],
      'howit_title' => ['required', 'string', 'max:100'],
      'pricing_title' => ['required', 'string', 'max:100'],
      'pricing_note' => ['required', 'string', 'max:150'],
      'final_cta_title' => ['required', 'string', 'max:150'],
      'final_cta_subtitle' => ['required', 'string', 'max:150'],
    ]);

    foreach ($payload as $key => $value) {
      SiteSetting::setValue($key, $value);
    }

    return back()->with('status', 'Pengaturan landing page berhasil diperbarui.');
  }
}
