<!doctype html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $title ?? 'Admin' }} | Ujion</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-100 text-slate-800">
  <nav class="fixed top-0 z-50 w-full border-b border-slate-200 bg-white">
    <div class="px-4 py-3 lg:px-6">
      <div class="flex items-center justify-between">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2">
          <span class="grid h-8 w-8 place-content-center rounded-lg bg-blue-600 text-sm font-bold text-white">U</span>
          <span class="text-base font-semibold">Ujion Admin</span>
        </a>
        <button data-drawer-target="sidebar" data-drawer-toggle="sidebar" type="button" class="inline-flex items-center rounded-lg p-2 text-slate-500 hover:bg-slate-100 lg:hidden" aria-controls="sidebar">
          <span class="sr-only">Buka sidebar</span>
          <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>
      </div>
    </div>
  </nav>

  <aside id="sidebar" class="fixed left-0 top-0 z-40 h-screen w-64 -translate-x-full border-r border-slate-200 bg-white pt-16 transition-transform lg:translate-x-0">
    <div class="h-full overflow-y-auto px-3 py-4">
      <ul class="space-y-2 font-medium">
        <li>
          <a href="{{ route('admin.dashboard') }}" class="group flex items-center rounded-lg p-2 {{ request()->routeIs('admin.dashboard') ? 'bg-blue-50 text-blue-700' : 'text-slate-700 hover:bg-slate-100' }}">
            <span class="ms-3">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="{{ route('admin.leads') }}" class="group flex items-center rounded-lg p-2 {{ request()->routeIs('admin.leads') ? 'bg-blue-50 text-blue-700' : 'text-slate-700 hover:bg-slate-100' }}">
            <span class="ms-3">Data Leads</span>
          </a>
        </li>
        <li>
          <a href="{{ route('admin.settings') }}" class="group flex items-center rounded-lg p-2 {{ request()->routeIs('admin.settings') ? 'bg-blue-50 text-blue-700' : 'text-slate-700 hover:bg-slate-100' }}">
            <span class="ms-3">Pengaturan Landing</span>
          </a>
        </li>
        <li>
          <a href="{{ route('landing.index') }}" target="_blank" class="group flex items-center rounded-lg p-2 text-slate-700 hover:bg-slate-100">
            <span class="ms-3">Lihat Landing Page</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>

  <main class="pt-20 lg:ml-64">
    <div class="p-4 lg:p-8">
      @if(session('status'))
      <div class="mb-6 rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
        {{ session('status') }}
      </div>
      @endif

      @yield('content')
    </div>
  </main>
</body>

</html>