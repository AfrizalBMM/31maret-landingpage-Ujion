@extends('admin.layouts.app', ['title' => 'Pengaturan Landing'])

@section('content')
<div class="mb-6">
  <h1 class="text-2xl font-semibold text-slate-900">Pengaturan Landing Page</h1>
  <p class="text-sm text-slate-500">Atur semua text dan konten landing page dari sini.</p>
</div>

<form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
  @csrf
  @method('PUT')

  <!-- Brand & Contact -->
  <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
    <h3 class="mb-4 text-lg font-semibold text-slate-900">Brand & Kontak</h3>
    <div class="grid gap-5 md:grid-cols-2">
      <div>
        <label for="brand" class="mb-2 block text-sm font-medium text-slate-700">Nama Brand</label>
        <input type="text" id="brand" name="brand" value="{{ old('brand', $settings['brand']) }}" maxlength="100" class="block w-full rounded-lg border border-slate-300 bg-white p-2.5 text-sm text-slate-900 focus:border-blue-500 focus:ring-blue-500" required>
        @error('brand')
        <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="whatsapp_number" class="mb-2 block text-sm font-medium text-slate-700">Nomor WhatsApp</label>
        <input type="text" id="whatsapp_number" name="whatsapp_number" value="{{ old('whatsapp_number', $settings['whatsapp_number']) }}" maxlength="30" class="block w-full rounded-lg border border-slate-300 bg-white p-2.5 text-sm text-slate-900 focus:border-blue-500 focus:ring-blue-500" placeholder="6281234567890" required>
        @error('whatsapp_number')
        <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
        @enderror
      </div>
    </div>
  </div>

  <!-- Hero Section -->
  <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
    <h3 class="mb-4 text-lg font-semibold text-slate-900">Section Hero</h3>
    <div class="grid gap-5">
      <div>
        <label for="hero_headline" class="mb-2 block text-sm font-medium text-slate-700">Headline</label>
        <input type="text" id="hero_headline" name="hero_headline" value="{{ old('hero_headline', $settings['hero_headline']) }}" maxlength="180" class="block w-full rounded-lg border border-slate-300 bg-white p-2.5 text-sm text-slate-900 focus:border-blue-500 focus:ring-blue-500" required>
        @error('hero_headline')
        <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="hero_subheadline" class="mb-2 block text-sm font-medium text-slate-700">Subheadline</label>
        <textarea id="hero_subheadline" name="hero_subheadline" rows="3" maxlength="260" class="block w-full rounded-lg border border-slate-300 bg-white p-2.5 text-sm text-slate-900 focus:border-blue-500 focus:ring-blue-500" required>{{ old('hero_subheadline', $settings['hero_subheadline']) }}</textarea>
        @error('hero_subheadline')
        <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
        @enderror
      </div>

      <div class="pt-4 border-t border-slate-100">
        <label for="hero_image" class="mb-2 block text-sm font-medium text-slate-700">Gambar Hero (Opsional)</label>
        @if(!empty($settings['hero_image']))
        <img src="{{ asset('storage/' . $settings['hero_image']) }}" class="mb-3 rounded-lg border border-slate-200" style="height: 80px; width: auto; object-fit: cover;">
        @endif
        <input type="file" id="hero_image" name="hero_image" accept="image/*" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
        @error('hero_image')
        <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
        @enderror
      </div>
    </div>
  </div>

  <!-- Problem Section -->
  <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
    <h3 class="mb-4 text-lg font-semibold text-slate-900">Section Tantangan</h3>
    <div class="grid gap-5">
      <div>
        <label for="problem_title" class="mb-2 block text-sm font-medium text-slate-700">Judul Section</label>
        <input type="text" id="problem_title" name="problem_title" value="{{ old('problem_title', $settings['problem_title']) }}" maxlength="150" class="block w-full rounded-lg border border-slate-300 bg-white p-2.5 text-sm text-slate-900 focus:border-blue-500 focus:ring-blue-500" required>
        @error('problem_title')
        <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="problem_close" class="mb-2 block text-sm font-medium text-slate-700">Closing Text</label>
        <textarea id="problem_close" name="problem_close" rows="2" maxlength="180" class="block w-full rounded-lg border border-slate-300 bg-white p-2.5 text-sm text-slate-900 focus:border-blue-500 focus:ring-blue-500" required>{{ old('problem_close', $settings['problem_close']) }}</textarea>
        @error('problem_close')
        <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
        @enderror
      </div>

      <div class="pt-4 border-t border-slate-100">
        <label for="problem_image" class="mb-2 block text-sm font-medium text-slate-700">Gambar Section Tantangan (Opsional)</label>
        @if(!empty($settings['problem_image']))
        <img src="{{ asset('storage/' . $settings['problem_image']) }}" class="mb-3 rounded-lg border border-slate-200" style="height: 80px; width: auto; object-fit: cover;">
        @endif
        <input type="file" id="problem_image" name="problem_image" accept="image/*" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
      </div>
    </div>
  </div>

  <!-- Benefit Section -->
  <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
    <h3 class="mb-4 text-lg font-semibold text-slate-900">Section Hasil yang Diraih</h3>
    <div class="grid gap-5">
      <div>
        <label for="benefit_title" class="mb-2 block text-sm font-medium text-slate-700">Judul Section</label>
        <input type="text" id="benefit_title" name="benefit_title" value="{{ old('benefit_title', $settings['benefit_title']) }}" maxlength="150" class="block w-full rounded-lg border border-slate-300 bg-white p-2.5 text-sm text-slate-900 focus:border-blue-500 focus:ring-blue-500" required>
        @error('benefit_title')
        <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
        @enderror
      </div>
      <div class="pt-4 border-t border-slate-100">
        <label for="benefit_image" class="mb-2 block text-sm font-medium text-slate-700">Gambar Section Hasil (Opsional)</label>
        @if(!empty($settings['benefit_image']))
        <img src="{{ asset('storage/' . $settings['benefit_image']) }}" class="mb-3 rounded-lg border border-slate-200" style="height: 80px; width: auto; object-fit: cover;">
        @endif
        <input type="file" id="benefit_image" name="benefit_image" accept="image/*" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
      </div>
    </div>
  </div>

  <!-- Solution Section -->
  <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
    <h3 class="mb-4 text-lg font-semibold text-slate-900">Section Solusi</h3>
    <div class="grid gap-5">
      <div>
        <label for="solution_title" class="mb-2 block text-sm font-medium text-slate-700">Judul Section</label>
        <input type="text" id="solution_title" name="solution_title" value="{{ old('solution_title', $settings['solution_title']) }}" maxlength="150" class="block w-full rounded-lg border border-slate-300 bg-white p-2.5 text-sm text-slate-900 focus:border-blue-500 focus:ring-blue-500" required>
        @error('solution_title')
        <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
        @enderror
      </div>
      <div class="pt-4 border-t border-slate-100">
        <label for="solution_image" class="mb-2 block text-sm font-medium text-slate-700">Gambar Section Solusi (Opsional)</label>
        @if(!empty($settings['solution_image']))
        <img src="{{ asset('storage/' . $settings['solution_image']) }}" class="mb-3 rounded-lg border border-slate-200" style="height: 80px; width: auto; object-fit: cover;">
        @endif
        <input type="file" id="solution_image" name="solution_image" accept="image/*" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
      </div>
    </div>
  </div>

  <!-- Features Section -->
  <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
    <h3 class="mb-4 text-lg font-semibold text-slate-900">Section Fitur Utama</h3>
    <div class="grid gap-5">
      <div>
        <label for="features_title" class="mb-2 block text-sm font-medium text-slate-700">Judul Section</label>
        <input type="text" id="features_title" name="features_title" value="{{ old('features_title', $settings['features_title']) }}" maxlength="100" class="block w-full rounded-lg border border-slate-300 bg-white p-2.5 text-sm text-slate-900 focus:border-blue-500 focus:ring-blue-500" required>
        @error('features_title')
        <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
        @enderror
      </div>
      <div class="pt-4 border-t border-slate-100">
        <label for="features_image" class="mb-2 block text-sm font-medium text-slate-700">Gambar Section Fitur (Opsional)</label>
        @if(!empty($settings['features_image']))
        <img src="{{ asset('storage/' . $settings['features_image']) }}" class="mb-3 rounded-lg border border-slate-200" style="height: 80px; width: auto; object-fit: cover;">
        @endif
        <input type="file" id="features_image" name="features_image" accept="image/*" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
      </div>
    </div>
  </div>

  <!-- How It Works Section -->
  <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
    <h3 class="mb-4 text-lg font-semibold text-slate-900">Section Cara Kerja</h3>
    <div class="grid gap-5">
      <div>
        <label for="howit_title" class="mb-2 block text-sm font-medium text-slate-700">Judul Section</label>
        <input type="text" id="howit_title" name="howit_title" value="{{ old('howit_title', $settings['howit_title']) }}" maxlength="100" class="block w-full rounded-lg border border-slate-300 bg-white p-2.5 text-sm text-slate-900 focus:border-blue-500 focus:ring-blue-500" required>
        @error('howit_title')
        <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
        @enderror
      </div>
      <div class="pt-4 border-t border-slate-100">
        <label for="howit_image" class="mb-2 block text-sm font-medium text-slate-700">Gambar Section Cara Kerja (Opsional)</label>
        @if(!empty($settings['howit_image']))
        <img src="{{ asset('storage/' . $settings['howit_image']) }}" class="mb-3 rounded-lg border border-slate-200" style="height: 80px; width: auto; object-fit: cover;">
        @endif
        <input type="file" id="howit_image" name="howit_image" accept="image/*" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
      </div>
    </div>
  </div>

  <!-- Pricing Section -->
  <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
    <h3 class="mb-4 text-lg font-semibold text-slate-900">Section Pricing</h3>
    <div class="grid gap-5">
      <div>
        <label for="pricing_title" class="mb-2 block text-sm font-medium text-slate-700">Judul Section</label>
        <input type="text" id="pricing_title" name="pricing_title" value="{{ old('pricing_title', $settings['pricing_title']) }}" maxlength="100" class="block w-full rounded-lg border border-slate-300 bg-white p-2.5 text-sm text-slate-900 focus:border-blue-500 focus:ring-blue-500" required>
        @error('pricing_title')
        <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="pricing_note" class="mb-2 block text-sm font-medium text-slate-700">Note / Subtitle</label>
        <input type="text" id="pricing_note" name="pricing_note" value="{{ old('pricing_note', $settings['pricing_note']) }}" maxlength="150" class="block w-full rounded-lg border border-slate-300 bg-white p-2.5 text-sm text-slate-900 focus:border-blue-500 focus:ring-blue-500" required>
        @error('pricing_note')
        <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
        @enderror
      </div>

      <div class="pt-4 border-t border-slate-100">
        <label for="pricing_image" class="mb-2 block text-sm font-medium text-slate-700">Gambar Section Pricing (Opsional)</label>
        @if(!empty($settings['pricing_image']))
        <img src="{{ asset('storage/' . $settings['pricing_image']) }}" class="mb-3 rounded-lg border border-slate-200" style="height: 80px; width: auto; object-fit: cover;">
        @endif
        <input type="file" id="pricing_image" name="pricing_image" accept="image/*" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
      </div>
    </div>
  </div>

  <!-- Final CTA Section -->
  <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
    <h3 class="mb-4 text-lg font-semibold text-slate-900">Section Final CTA</h3>
    <div class="grid gap-5">
      <div>
        <label for="final_cta_title" class="mb-2 block text-sm font-medium text-slate-700">Headline</label>
        <input type="text" id="final_cta_title" name="final_cta_title" value="{{ old('final_cta_title', $settings['final_cta_title']) }}" maxlength="150" class="block w-full rounded-lg border border-slate-300 bg-white p-2.5 text-sm text-slate-900 focus:border-blue-500 focus:ring-blue-500" required>
        @error('final_cta_title')
        <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="final_cta_subtitle" class="mb-2 block text-sm font-medium text-slate-700">Subtitle</label>
        <input type="text" id="final_cta_subtitle" name="final_cta_subtitle" value="{{ old('final_cta_subtitle', $settings['final_cta_subtitle']) }}" maxlength="150" class="block w-full rounded-lg border border-slate-300 bg-white p-2.5 text-sm text-slate-900 focus:border-blue-500 focus:ring-blue-500" required>
        @error('final_cta_subtitle')
        <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
        @enderror
      </div>

      <div class="pt-4 border-t border-slate-100">
        <label for="final_cta_image" class="mb-2 block text-sm font-medium text-slate-700">Gambar Final CTA (Opsional)</label>
        @if(!empty($settings['final_cta_image']))
        <img src="{{ asset('storage/' . $settings['final_cta_image']) }}" class="mb-3 rounded-lg border border-slate-200" style="height: 80px; width: auto; object-fit: cover;">
        @endif
        <input type="file" id="final_cta_image" name="final_cta_image" accept="image/*" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
      </div>
    </div>
  </div>

  <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
    <div class="flex flex-wrap gap-3">
      <button type="submit" class="rounded-lg bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white hover:bg-blue-700">Simpan Perubahan</button>
      <a href="{{ route('landing.index') }}" target="_blank" class="rounded-lg border border-slate-300 bg-white px-5 py-2.5 text-sm font-semibold text-slate-700 hover:bg-slate-50">Preview Landing</a>
    </div>
  </div>
</form>
@endsection