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
        <div
          class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
          <ul class="flex flex-wrap -mb-px">
            <li class="mr-2">
              <a href="#" class="inline-block p-4 text-blue-600 rounded-t-lg border-b-2 border-blue-600">Ta的话题</a>
            </li>
            <li class="mr-2">
              <a href="#"
                class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300">Ta的回复</a>
            </li>
          </ul>
        </div>
        <div class="grow shrink p-4">
          @include('users.topics', ['topics' => $user->topics()->recent()->paginate(5)])
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
