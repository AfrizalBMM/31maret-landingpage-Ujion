@extends('admin.layouts.app', ['title' => 'Data Leads'])

@section('content')
<div class="mb-6">
  <h1 class="text-2xl font-semibold text-slate-900">Data Leads</h1>
  <p class="text-sm text-slate-500">Semua lead dari form landing page.</p>
</div>

<div class="rounded-xl border border-slate-200 bg-white shadow-sm">
  <div class="overflow-x-auto">
    <table class="w-full text-left text-sm text-slate-600">
      <thead class="bg-slate-50 text-xs uppercase text-slate-500">
        <tr>
          <th class="px-5 py-3">Nama</th>
          <th class="px-5 py-3">Kontak</th>
          <th class="px-5 py-3">Sekolah</th>
          <th class="px-5 py-3">Peran</th>
          <th class="px-5 py-3">CTA</th>
          <th class="px-5 py-3">Waktu</th>
        </tr>
      </thead>
      <tbody>
        @forelse($leads as $lead)
        <tr class="border-t border-slate-100">
          <td class="px-5 py-3 font-medium text-slate-900">{{ $lead->name }}</td>
          <td class="px-5 py-3">
            <div>{{ $lead->phone }}</div>
            @if($lead->email)
            <div class="text-xs text-slate-500">{{ $lead->email }}</div>
            @endif
          </td>
          <td class="px-5 py-3">{{ $lead->school_name }}</td>
          <td class="px-5 py-3">{{ $lead->role }}</td>
          <td class="px-5 py-3">{{ $lead->cta_variant }}</td>
          <td class="px-5 py-3">{{ $lead->created_at?->format('d M Y H:i') }}</td>
        </tr>
        @empty
        <tr>
          <td colspan="6" class="px-5 py-6 text-center text-slate-500">Belum ada data lead.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>

<div class="mt-4">
  {{ $leads->links() }}
</div>
@endsection