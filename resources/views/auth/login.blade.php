<!doctype html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Admin | Ujion</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex items-center justify-center bg-slate-100 min-h-screen p-4">
  <div class="w-full max-w-sm rounded-xl border border-slate-200 bg-white shadow-sm p-6">
    <div class="mb-6 text-center">
      <h1 class="text-2xl font-semibold text-slate-900">Admin Ujion</h1>
      <p class="text-sm text-slate-500 mt-1">Masuk untuk mengelola landing page</p>
    </div>

    @if($errors->any())
    <div class="mb-4 rounded-lg border border-rose-200 bg-rose-50 px-3 py-2 text-sm text-rose-700">
      {{ $errors->first('email') }}
    </div>
    @endif

    <form action="{{ route('login') }}" method="POST" class="space-y-4">
      @csrf

      <div>
        <label for="email" class="block text-sm font-medium text-slate-700 mb-1">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2 text-sm text-slate-900 focus:border-blue-500 focus:ring-blue-500" required autofocus>
      </div>

      <div>
        <label for="password" class="block text-sm font-medium text-slate-700 mb-1">Password</label>
        <input type="password" id="password" name="password" class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2 text-sm text-slate-900 focus:border-blue-500 focus:ring-blue-500" required>
      </div>

      <div class="flex items-center">
        <input type="checkbox" id="remember" name="remember" class="h-4 w-4 text-blue-600">
        <label for="remember" class="ml-2 text-sm text-slate-600">Ingat saya</label>
      </div>

      <button type="submit" class="w-full rounded-lg bg-blue-600 px-4 py-2 text-sm font-semibold text-white hover:bg-blue-700">Login</button>
    </form>

    <p class="text-center text-xs text-slate-500 mt-4">
      Demo: admin@example.com / password
    </p>
  </div>
</body>

</html>