@extends('admin.layouts.app', ['title' => 'Dashboard'])

@section('content')
<div class="mb-6 flex items-center justify-between">
  <div>
    <h1 class="text-2xl font-semibold text-slate-900">Dashboard Admin</h1>
    <p class="text-sm text-slate-500">Ringkasan performa landing page dan konversi lead.</p>
  </div>
</div>

<div class="mb-6 grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
  <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
    <p class="text-sm text-slate-500">Total Leads</p>
    <p class="mt-2 text-2xl font-semibold text-slate-900">{{ number_format($stats['total_leads']) }}</p>
  </div>
  <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
    <p class="text-sm text-slate-500">Leads Hari Ini</p>
    <p class="mt-2 text-2xl font-semibold text-slate-900">{{ number_format($stats['today_leads']) }}</p>
  </div>
  <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
    <p class="text-sm text-slate-500">Total Event Tracking</p>
    <p class="mt-2 text-2xl font-semibold text-slate-900">{{ number_format($stats['total_events']) }}</p>
  </div>
  <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
    <p class="text-sm text-slate-500">Total Klik CTA</p>
    <p class="mt-2 text-2xl font-semibold text-slate-900">{{ number_format($stats['cta_clicks']) }}</p>
  </div>
</div>

<div class="rounded-xl border border-slate-200 bg-white shadow-sm">
  <div class="border-b border-slate-200 px-5 py-4">
    <h2 class="text-lg font-semibold text-slate-900">Leads Terbaru</h2>
  </div>
  <div class="overflow-x-auto">
    <table class="w-full text-left text-sm text-slate-600">
      <thead class="bg-slate-50 text-xs uppercase text-slate-500">
        <tr>
          <th class="px-5 py-3">Nama</th>
          <th class="px-5 py-3">Sekolah</th>
          <th class="px-5 py-3">Role</th>
          <th class="px-5 py-3">CTA</th>
          <th class="px-5 py-3">Waktu</th>
        </tr>
      </thead>
      <tbody>
        @forelse($recentLeads as $lead)
        <tr class="border-t border-slate-100">
          <td class="px-5 py-3 font-medium text-slate-900">{{ $lead->name }}</td>
          <td class="px-5 py-3">{{ $lead->school_name }}</td>
          <td class="px-5 py-3">{{ $lead->role }}</td>
          <td class="px-5 py-3">{{ $lead->cta_variant }}</td>
          <td class="px-5 py-3">{{ $lead->created_at?->format('d M Y H:i') }}</td>
        </tr>
        @empty
        <tr>
          <td colspan="5" class="px-5 py-6 text-center text-slate-500">Belum ada data lead.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection