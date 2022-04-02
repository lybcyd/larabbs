<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ $title ?? 'LaraBBS' }} - LaraBBS</title>

  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

  <!-- Styles -->
  <link rel="stylesheet" href="{{ mix('css/app.css') }}">

  <!-- Scripts -->
  <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased relative">
  <div class="min-h-screen bg-gray-100 pb-16">
    @include('layouts.navigation')
    <!-- Page Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-5 overflow-auto">
      @include('shared.messages')
      {{ $slot }}
    </main>
    @include('layouts.footer')
  </div>
</body>

</html>
