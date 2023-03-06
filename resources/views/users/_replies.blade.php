@if (count($replies))

  <ul class="list-group list-group-flush">
    @foreach ($replies as $reply)
      <li class="list-group-item px-2">
        <a class="text-decoration-none" href="{{ $reply->topic->link(['#reply' . $reply->id]) }}">
          {{ $reply->topic->title }}
        </a>

        <div class="reply-content text-secondary my-2">
          {!! $reply->content !!}
        </div>

        <div class="text-secondary" style="font-size:0.9em;">
          <i class="far fa-clock"></i> 回复于 {{ $reply->created_at->diffForHumans() }}
        </div>
      </li>
    @endforeach
  </ul>

@else
  <div class="empty-block">暂无数据 ~_~ </div>
@endif

{{-- 分页 --}}
<div class="mt-4 pt-1">
  {{ $replies->appends(request()->query())->links() }}
</div>
