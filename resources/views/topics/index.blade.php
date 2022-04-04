<x-app-layout>
  <x-slot name="title">
    {{ isset($category) ? $category->name : '话题列表' }}
  </x-slot>

  <div class="flex mb-5">
    <div class="w-2/3 topic-list mr-6">
      @if (isset($category))
      <div class="p-4 mb-4 text-sm rounded-lg text-sky-700 bg-sky-100 border border-sky-200" role="alert">
        {{ $category->name }} ：{{ $category->description }}
      </div>
      @endif
      <div class="flex flex-col border rounded-md bg-white">
        <div class="py-2 px-4 border-b">
          <ul class="flex text-sm">
            <li @class([ 'py-1' , 'px-3' , 'rounded-md' , 'mr-2' , 'bg-blue-600'=> request()->order !== 'recent',
              'text-white' => request()->order !== 'recent',
              'hover:bg-blue-50' => request()->order === 'recent',
              ])>
              <a href="?order=default">最后回复</a>
            </li>
            <li @class([ 'py-1' , 'px-3' , 'rounded-md' , 'bg-blue-600'=> request()->order === 'recent',
              'text-white' => request()->order === 'recent',
              'hover:bg-blue-50' => request()->order !== 'recent',
              ])>
              <a href="?order=recent">最新发布</a>
            </li>
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
