<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ $title ?? 'LaraBBS' }} - LaraBBS</title>
  <meta name="description" content="{{ $description ?? 'LaraBBS 爱好者社区' }}">

  <!-- Styles -->
  <link rel="stylesheet" href="{{ mix('css/app.css') }}">

  <!-- Scripts -->
  <script src="{{ mix('js/app.js') }}" defer></script>

  {{ $scripts ?? '' }}
</head>

<body>
  <div id="app">
    @include('layouts.navigation')
    <!-- Page Content -->
    <main class="container">
      @include('shared.messages')
      {{ $slot }}
    </main>
    @include('layouts.footer')
  </div>
</body>

</html>
