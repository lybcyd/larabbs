<x-app-layout>
  <x-slot name='title'>
    {{ $user->name }}的个人中心
  </x-slot>
  <div class="flex gap-x-10">
    <div class="hidden md:w-1/4 md:block">
      <div class="flex flex-col border rounded bg-white">
        <img src="https://cdn.learnku.com/uploads/images/201709/20/1/PtDKbASVcz.png?imageView2/1/w/600/h/600"
          alt="{{ $user->name }}">
        <div class="grow shrink p-4">
          <h5 class="text-xl mb-2"><strong>个人简介</strong></h5>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
          <hr class="my-4">
          <h5 class="text-xl mb-2"><strong>注册于</strong></h5>
          <p>January 01 1901</p>
        </div>
      </div>
    </div>
    <div class="w-3/4 md:w-full">
      <div class="flex flex-col border rounded bg-white">
        <div class="grow shrink p-4">
          <h1 class="mb-0 text-2xl">{{ $user->name }} <small>{{ $user->email }}</small></h1>
        </div>
      </div>
      <hr class="my-4">

      {{-- 用户发布的内容 --}}
      <div class="flex flex-col border rounded bg-white">
        <div class="grow shrink p-4">
          暂无数据 ~_~
        </div>
      </div>

    </div>
  </div>
</x-app-layout>
