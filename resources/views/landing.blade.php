<!doctype html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="description"
    content="Platform ujian digital modern untuk sekolah. Hemat waktu koreksi, analisis instan, siap TKA.">
  <title>{{ $brand }} | Platform Ujian Digital untuk Sekolah</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Sora:wght@500;600;700;800&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}">
  <style>
    /* Styling modern ramah anak & guru untuk gambar hero tiap section */
    .section-hero-img {
      width: 100%;
      height: auto;
      max-height: 480px;
      object-fit: cover;
      border-radius: 28px;
      margin: 2rem auto 3rem;
      display: block;
      /* Soft drop-shadow gives a floating, modern friendly feel */
      filter: drop-shadow(0 16px 32px rgba(0, 0, 0, 0.08));
    }
    
    .hero-main-img {
      width: 100%;
      max-height: 420px;
      object-fit: cover;
      border-radius: 32px;
      margin-top: 2.5rem;
      border: 8px solid rgba(255, 255, 255, 0.6);
      box-shadow: 0 24px 48px -12px rgba(0, 0, 0, 0.12);
    }
  </style>
</head>

<body>
  <div class="bg-orb bg-orb-1" aria-hidden="true"></div>
  <div class="bg-orb bg-orb-2" aria-hidden="true"></div>

  <header class="container topbar">
    <a href="#" class="brand" aria-label="{{ $brand }}">
      <span class="brand-mark">U</span>
      <span class="brand-text">{{ $brand }}</span>
    </a>
    <a href="#lead-form" class="btn btn-sm btn-outline js-track" data-event="cta_click" data-label="topbar_jadwalkan">
      Jadwalkan Presentasi
    </a>
  </header>

  <main>
    <section class="hero container" id="hero">
      <div class="hero-left reveal">
        <p class="eyebrow">Platform ujian digital modern</p>
        <h1>{{ $heroHeadline }}</h1>
        <p class="hero-subtitle">{{ $heroSubtitle }}</p>

        <div class="hero-cta">
          <a href="#lead-form" class="btn btn-primary js-track" data-event="cta_click" data-label="hero_coba_demo">Coba
            Demo Gratis</a>
          <a href="#pricing" class="btn btn-light js-track" data-event="cta_click" data-label="hero_mulai_sekolah">Mulai
            untuk Sekolah Anda</a>
        </div>

        <p class="trust-note">Tanpa instalasi • Bisa langsung digunakan</p>
        
        @if(!empty($heroImage))
        <img src="{{ asset('storage/' . $heroImage) }}" alt="{{ $heroHeadline }}" class="hero-main-img" loading="lazy">
        @endif
      </div>

      <aside class="hero-card reveal delay-1" aria-label="Form Lead Cepat">
        <h2>Mulai dari satu kelas dulu</h2>
        <p>Kirim data singkat dan tim kami akan hubungi Anda.</p>

        @if(session('status'))
        <div class="alert-success">{{ session('status') }}</div>
        @endif

        @if($errors->any())
        <div class="alert-error">
          <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif

        <form action="{{ route('landing.leads.store') }}" method="POST" id="lead-form" class="lead-form">
          @csrf
          <label for="name">Nama Lengkap</label>
          <input id="name" name="name" type="text" required value="{{ old('name') }}">

          <label for="phone">No. WhatsApp</label>
          <input id="phone" name="phone" type="text" required value="{{ old('phone') }}">

          <label for="email">Email (opsional)</label>
          <input id="email" name="email" type="email" value="{{ old('email') }}">

          <label for="school_name">Nama Sekolah</label>
          <input id="school_name" name="school_name" type="text" required value="{{ old('school_name') }}">

          <label for="role">Peran</label>
          <select id="role" name="role" required>
            <option value="" disabled {{ old('role') ? '' : 'selected' }}>Pilih Peran</option>
            <option value="Kepala Sekolah" {{ old('role') === 'Kepala Sekolah' ? 'selected' : '' }}>Kepala Sekolah
            </option>
            <option value="Guru" {{ old('role') === 'Guru' ? 'selected' : '' }}>Guru</option>
            <option value="Operator sekolah" {{ old('role') === 'Operator sekolah' ? 'selected' : '' }}>Operator sekolah
            </option>
            <option value="Yayasan pendidikan" {{ old('role') === 'Yayasan pendidikan' ? 'selected' : '' }}>Yayasan
              pendidikan</option>
          </select>

          <label for="message">Kebutuhan Utama (opsional)</label>
          <textarea id="message" name="message" rows="3">{{ old('message') }}</textarea>

          <input type="hidden" name="cta_variant" id="cta_variant" value="Coba Demo Gratis">

          <button type="submit" class="btn btn-primary btn-block js-track" data-event="lead_submit_click"
            data-label="form_submit_demo">Coba Demo Gratis</button>
          <button type="button" id="btn-presentation" class="btn btn-outline btn-block js-track" data-event="cta_click"
            data-label="form_jadwalkan_presentasi">Jadwalkan Presentasi</button>
        </form>
      </aside>
    </section>

    <section class="section section-alt reveal" id="problem">
      <div class="container">
        <h2>{{ $problemTitle }}</h2>
        @if(!empty($problemImage))
        <img src="{{ asset('storage/' . $problemImage) }}" alt="{{ $problemTitle }}" class="section-hero-img" loading="lazy">
        @endif
        <div class="grid grid-4">
          <article class="card">
            <p>Guru capek koreksi manual</p>
          </article>
          <article class="card">
            <p>Siswa tidak tahu kesalahan mereka</p>
          </article>
          <article class="card">
            <p>Tidak ada data untuk evaluasi</p>
          </article>
          <article class="card">
            <p>Ujian tidak efisien</p>
          </article>
        </div>
        <p class="section-close">{{ $problemClose }}</p>
      </div>
    </section>

    <section class="section reveal" id="benefit">
      <div class="container">
        <h2>{{ $benefitTitle }}</h2>
        @if(!empty($benefitImage))
        <img src="{{ asset('storage/' . $benefitImage) }}" alt="{{ $benefitTitle }}" class="section-hero-img" loading="lazy">
        @endif
        <div class="grid grid-2">
          <article class="card metric"><strong>90%</strong>
            <p>Hemat waktu koreksi hingga 90%</p>
          </article>
          <article class="card metric"><strong>Data Lengkap</strong>
            <p>Evaluasi siswa lebih presisi dan terukur</p>
          </article>
          <article class="card metric"><strong>Siap TKA</strong>
            <p>Persiapan ujian lebih terarah per materi</p>
          </article>
          <article class="card metric"><strong>Performa Naik</strong>
            <p>Peningkatan hasil belajar siswa bertahap</p>
          </article>
        </div>
      </div>
    </section>

    <section class="section section-alt reveal" id="solution">
      <div class="container">
        <h2>{{ $solutionTitle }}</h2>
        @if(!empty($solutionImage))
        <img src="{{ asset('storage/' . $solutionImage) }}" alt="{{ $solutionTitle }}" class="section-hero-img" loading="lazy">
        @endif
        <div class="grid grid-2">
          <article class="card">
            <h3>Ujian online</h3>
            <p>Mode token dan mandiri untuk semua model kelas.</p>
          </article>
          <article class="card">
            <h3>Hasil otomatis</h3>
            <p>Nilai real-time tanpa menunggu koreksi manual.</p>
          </article>
          <article class="card">
            <h3>Analisis lengkap</h3>
            <p>Detail performa siswa, kelas, hingga topik materi.</p>
          </article>
          <article class="card">
            <h3>Pembahasan soal</h3>
            <p>Siswa belajar dari kesalahan dengan feedback instan.</p>
          </article>
        </div>
      </div>
    </section>

    <section class="section reveal" id="features">
      <div class="container">
        <h2>{{ $featuresTitle }}</h2>
        @if(!empty($featuresImage))
        <img src="{{ asset('storage/' . $featuresImage) }}" alt="{{ $featuresTitle }}" class="section-hero-img" loading="lazy">
        @endif
        <div class="feature-list">
          <article class="card">
            <h3>Ujian fleksibel</h3>
            <p>Token atau self-paced sesuai strategi sekolah.</p>
          </article>
          <article class="card">
            <h3>Analitik & leaderboard</h3>
            <p>Lihat ranking, ketuntasan, dan progres belajar.</p>
          </article>
          <article class="card">
            <h3>Anti-cheat system</h3>
            <p>Proteksi ujian agar proses lebih fair dan kredibel.</p>
          </article>
          <article class="card">
            <h3>Pembahasan soal</h3>
            <p>Review jawaban untuk penguatan konsep siswa.</p>
          </article>
        </div>
      </div>
    </section>

    <section class="section section-alt reveal" id="how-it-works">
      <div class="container">
        <h2>{{ $howitTitle }}</h2>
        @if(!empty($howitImage))
        <img src="{{ asset('storage/' . $howitImage) }}" alt="{{ $howitTitle }}" class="section-hero-img" loading="lazy">
        @endif
        <ol class="steps">
          <li>Guru membuat ujian</li>
          <li>Siswa mengerjakan</li>
          <li>Sistem mengoreksi otomatis</li>
          <li>Hasil & analisis tampil</li>
        </ol>
      </div>
    </section>

    <section class="section reveal" id="pricing">
      <div class="container pricing-box">
        <h2>{{ $pricingTitle }}</h2>
        @if(!empty($pricingImage))
        <img src="{{ asset('storage/' . $pricingImage) }}" alt="{{ $pricingTitle }}" class="section-hero-img" loading="lazy" style="max-height: 250px;">
        @endif
        <p class="price">{{ $pricingNote }}</p>
        <ul>
          <li>Semua fitur</li>
          <li>Ujian tanpa batas</li>
          <li>Analisis lengkap</li>
        </ul>
        <a href="#lead-form" class="btn btn-primary js-track" data-event="cta_click"
          data-label="pricing_mulai_sekarang">Mulai Sekarang</a>
      </div>
    </section>

    <section class="section final-cta reveal" id="final-cta">
      <div class="container">
        <h2>{{ $finalCtaTitle }}</h2>
        @if(!empty($finalCtaImage))
        <img src="{{ asset('storage/' . $finalCtaImage) }}" alt="{{ $finalCtaTitle }}" class="section-hero-img" loading="lazy">
        @endif
        <p>{{ $finalCtaSubtitle }}</p>
        <div class="hero-cta center">
          <a href="#lead-form" class="btn btn-primary js-track" data-event="cta_click" data-label="final_coba_demo">Coba
            Demo Gratis</a>
          <a href="https://wa.me/{{ preg_replace('/\D+/', '', $whatsappNumber) }}" target="_blank" rel="noopener"
            class="btn btn-light js-track" data-event="cta_click" data-label="final_whatsapp">Kontak WhatsApp</a>
        </div>
      </div>
    </section>
  </main>

  <footer class="footer">
    <div class="container footer-content">
      <p>&copy; {{ date('Y') }} {{ $brand }}</p>
      <nav>
        <a href="#">Tentang Kami</a>
        <a href="#">Kontak</a>
        <a href="#">Privacy Policy</a>
        <a href="#">Terms</a>
      </nav>
    </div>
  </footer>

  <a href="#lead-form" class="sticky-mobile-cta btn btn-primary js-track" data-event="cta_click"
    data-label="sticky_coba_demo">Coba Demo Gratis</a>

  <script>
    window.lpConfig = {
      trackingEndpoint: "{{ route('landing.tracking.event') }}",
      whatsappNumber: "{{ preg_replace('/\D+/', '', $whatsappNumber) }}",
    };
  </script>
  <script src="{{ asset('assets/js/landing.js') }}" defer></script>
</body>

</html>