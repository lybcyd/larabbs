@if (count($topics))
<ul>
  @foreach ($topics as $topic)
  <li class="flex">
    <div class="">
      <a href="{{ route('users.show', [$topic->user_id]) }}">
        <img class="rounded border p-1 mr-3 w-12 h-12" src="{{ $topic->user->avatar }}"
          title="{{ $topic->user->name }}">
      </a>
    </div>

    <div class="grow">

      <div class="mt-0 mb-1 flex justify-between">
        <a href="{{ route('topics.show', [$topic->id]) }}" title="{{ $topic->title }}" class="hover:text-blue-700">
          {{ $topic->title }}
        </a>
        <a href="{{ route('topics.show', [$topic->id]) }}">
          <span class="rounded-full bg-slate-500 text-white text-xs px-3 py-1"> {{ $topic->reply_count }} </span>
        </a>
      </div>

      <small class="items-center text-sm text-slate-500">
        <a href="{{ route('categories.show', $topic->category_id) }}" title="{{ $topic->category->name }}"
          class="hover:text-blue-700">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24"
            stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
          </svg>
          <span class="align-middle">{{ $topic->category->name }}</span>
        </a>
        <span class="px-1">•</span>
        <a href="{{ route('users.show', [$topic->user_id]) }}" title="{{ $topic->user->name }}"
          class="hover:text-blue-700">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24"
            stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
          </svg>
          <span class="align-middle">{{ $topic->user->name }}</span>
        </a>
        <span class="px-1">•</span>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24"
          stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span class="align-middle" title="最后活跃于：{{ $topic->updated_at }}">
          {{ $topic->updated_at->diffForHumans() }}
        </span>
      </small>
    </div>
  </li>

  @if(!$loop->last)
  <hr class="my-3">
  @endif

  @endforeach
</ul>

@else
<div class="empty-block">暂无数据 ~_~ </div>
@endif
