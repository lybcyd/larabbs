@php
$classMapping = [
'danger' => 'text-red-700 bg-red-100 border border-red-200',
'warning' => 'text-yellow-700 bg-yellow-100 border border-yellow-300',
'success' => 'text-lime-700 bg-lime-100 border border-lime-200',
'info' => 'text-sky-700 bg-sky-100 border border-sky-200',
]
@endphp

@foreach (['danger', 'warning', 'success', 'info'] as $msg)
@if(session()->has($msg))
<div class="p-4 mb-4 text-sm rounded-lg {{ $classMapping[$msg] }}" role="alert">
  {{ session($msg) }}
</div>
@endif
@endforeach
