<x-app-layout>
  <x-slot name="title">
    {{ isset($category) ? $category->name : '话题列表' }}
  </x-slot>

  <div class="row mb-5">
    <div class="col-lg-9 col-md-9 topic-list">
      @if (isset($category))
      <div class="alert alert-info" role="alert">
        {{ $category->name }} ：{{ $category->description }}
      </div>
      @endif
      <div class="card">
        <div class="card-header bg-transparent">
          <ul class="nav nav-pills">
            <li class="nav-item">
              <a href="?order=default" @class([ 'nav-link' , 'active'=> request()->order !== 'recent'])>最后回复</a>
            </li>
            <li class="nav-item">
              <a href="?order=recent" @class([ 'nav-link' , 'active'=> request()->order === 'recent'])>最新发布</a>
            </li>
          </ul>
        </div>

        <div class="card-body">
          {{-- 话题列表 --}}
          @include('topics.topic_list', ['topics' => $topics])
          {{-- 分页 --}}
          <div class="mt-5">
            {{ $topics->links() }}
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-3 sidebar">
      @include('topics.sidebar')
    </div>
  </div>
</x-app-layout>
