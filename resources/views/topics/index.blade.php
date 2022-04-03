<x-app-layout>
  <x-slot name="title">
    话题列表
  </x-slot>

  <div class="flex mb-5">
    <div class="w-2/3 topic-list mr-6">
      <div class="flex flex-col border rounded-md bg-white">
        <div class="py-2 px-4 border-b">
          <ul class="flex text-sm">
            <li class="py-1 px-3 rounded-md mr-2 bg-indigo-500 text-white"><a href="#">最后回复</a></li>
            <li class="py-1 px-3 rounded-md hover:bg-indigo-50"><a href="#">最新发布</a></li>
          </ul>
        </div>
        <div class="grow shrink p-4">
          {{-- 话题列表 --}}
          @include('topics.topic_list', ['topics' => $topics])
          {{-- 分页 --}}
          <div class="mt-5">
            {{ $topics->links() }}
          </div>
        </div>
      </div>
    </div>

    <div class="w-1/3">
      @include('topics.sidebar')
    </div>
  </div>
</x-app-layout>
