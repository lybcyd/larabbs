@if (count($topics))

<ul class="list-group list-group-flush">
  @foreach ($topics as $topic)
  <li class="list-group-item">
    <a class="text-decoration-none" href="{{ $topic->link() }}">
      {{ $topic->title }}
    </a>
    <span class="meta float-end text-secondary">
      {{ $topic->reply_count }} 回复
      <span> ⋅ </span>
      {{ $topic->created_at->diffForHumans() }}
    </span>
  </li>
  @endforeach
</ul>

@else
<div class="empty-block">暂无数据 ~_~ </div>
@endif

{{-- 分页 --}}
<div class="mt-4">
  {{ $topics->links() }}
</div>
