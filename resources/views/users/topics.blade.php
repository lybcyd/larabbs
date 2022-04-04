@if (count($topics))
<ul class="list-group">
  @foreach ($topics as $topic)
  <li class="px-4 py-2 border-b">
    <a class="hover:text-blue-700" href="{{ route('topics.show', $topic->id) }}">
      {{ $topic->title }}
    </a>
    <span class="meta float-right text-secondary">
      {{ $topic->reply_count }} 回复
      <span>⋅</span>
      {{ $topic->created_at->diffForHumans() }}
    </span>
  </li>
  @endforeach
</ul>
@else
<div class="empty-block">暂无数据 ~_~ </div>
@endif

<div class="mt-4 pt-1">
  {{ $topics->links() }}
</div>
