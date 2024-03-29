<x-app-layout>
  <x-slot name="title">
    {{ $topic->title }}
  </x-slot>
  <x-slot name="description">
    {{ $topic->excerpt }}
  </x-slot>
  <div class="row">

    <div class="col-lg-3 col-md-3 hidden-sm hidden-xs author-info">
      <div class="card ">
        <div class="card-body">
          <div class="text-center">
            作者：{{ $topic->user->name }}
          </div>
          <hr>
          <div class="media">
            <div>
              <a href="{{ route('users.show', $topic->user->id) }}">
                <img class="thumbnail img-fluid" src="{{ $topic->user->avatar }}" width="300px" height="300px">
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 topic-content">
      <div class="card ">
        <div class="card-body">
          <h1 class="text-center mt-3 mb-3">
            {{ $topic->title }}
          </h1>

          <div class="article-meta text-center text-secondary">
            {{ $topic->created_at->diffForHumans() }}
            ⋅
            <i class="far fa-comment"></i>
            {{ $topic->reply_count }}
          </div>

          <div class="topic-body mt-4 mb-4">
            {!! $topic->body !!}
          </div>

          @can('update', $topic)
          <div class="operate">
            <hr>
            <a href="{{ route('topics.edit', $topic->id) }}" class="btn btn-outline-secondary btn-sm" role="button">
              <i class="far fa-edit"></i> 编辑
            </a>
            <form action="{{ route('topics.destroy', $topic->id) }}" method="post" style="display: inline-block;"
              onsubmit="return confirm('您确定要删除吗？');">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-outline-secondary btn-sm">
                <i class="far fa-trash-alt"></i> 删除
              </button>
            </form>
          </div>
          @endcan

        </div>
      </div>
      {{-- 用户回复列表 --}}
      <div class="card topic-reply mt-4">
        <div class="card-body">
          @auth
          @include('topics._reply_box', ['topic' => $topic])
          @endauth
          @include('topics._reply_list', ['replies' => $topic->replies()->with('user')->get()])
        </div>
      </div>
    </div>
  </div>

</x-app-layout>
