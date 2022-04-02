@php
$classMapping = [
'danger' => 'text-red-700 bg-red-100 border border-red-400',
'warning' => 'text-yellow-700 bg-yellow-100 border border-yellow-400',
'success' => 'text-green-700 bg-green-100 border border-green-400',
'info' => 'text-blue-700 bg-blue-100 border border-blue-400',
]
@endphp

@foreach (['danger', 'warning', 'success', 'info'] as $msg)
@if(session()->has($msg))
<div class="p-4 mb-4 text-sm rounded-lg {{ $classMapping[$msg] }}" role="alert">
  {{ session($msg) }}
</div>
@endif
@endforeach
