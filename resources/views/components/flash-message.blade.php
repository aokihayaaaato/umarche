{{--  【status】の初期値はinfoとする  --}}
@props([
  'status' => 'info'
])

{{--  if($status === 'info') {
  $bgColor = 'bg-blue-300';
}
if($status === 'error') {
  $bgColor = 'bg-red-500';
}  --}}
{{--  session変数に切り替え  --}}
@php
  if(session('status') === 'info') {
    $bgColor = 'bg-blue-300';
  }
  if(session('status') === 'alert') {
    $bgColor = 'bg-red-500';
  }
@endphp

@if (session('message'))
  <div class="{{ $bgColor }} w-1/2 mx-auto p-2 text-white">
    {{ session('message') }}
  </div>
@endif