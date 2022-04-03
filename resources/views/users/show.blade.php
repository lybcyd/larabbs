<x-app-layout>
  <x-slot name='title'>
    {{ $user->name }}的个人中心
  </x-slot>
  <div class="flex gap-x-10">
    <div class="hidden md:w-1/4 md:block">
      <div class="flex flex-col border rounded-md bg-white">
        <img src="{{ $user->avatar }}" alt="{{ $user->name }}" class="rounded-t-md">
        <div class="grow shrink p-4">
          <h5 class="text-xl mb-2"><strong>个人简介</strong></h5>
          <p>{{ $user->introduction }}</p>
          <hr class="my-4">
          <h5 class="text-xl mb-2"><strong>注册于</strong></h5>
          <p>{{ $user->created_at->diffForHumans() }}</p>
        </div>
      </div>
    </div>
    <div class="w-3/4 md:w-full">
      <div class="flex flex-col border rounded-md bg-white">
        <div class="grow shrink p-4">
          <h1 class="mb-0 text-2xl">{{ $user->name }} <small>{{ $user->email }}</small></h1>
        </div>
      </div>
      <hr class="my-4">

      {{-- 用户发布的内容 --}}
      <div class="flex flex-col border rounded-md bg-white">
        <div class="grow shrink p-4">
          暂无数据 ~_~
        </div>
      </div>

    </div>
  </div>
</x-app-layout>
