<x-app-layout>
  <div class="container">
    <div class="col-md-10 offset-md-1">
      <div class="card">
        <div class="card-body">
          <h2>
            <i class="fa-regular fa-pen-to-square"></i>
            @if ($topic->id)
            编辑话题
            @else
            新建话题
            @endif
          </h2>
          <hr>
          @if ($topic->id)
          <form action="{{ route('topics.update', $topic->id) }}" method="POST" accept-charset="UTF-8">
            @method('PUT')
            @else
            <form action="{{ route('topics.store') }}" method="POST" accept-charset="UTF-8">
              @endif

              @csrf

              @include('shared.error')

              <div class="mb-3">
                <input class="form-control" type="text" name="title" value="{{ old('title', $topic->title) }}"
                  placeholder="请填写标题" required />
              </div>

              <div class="mb-3">
                <select class="form-select" name="category_id" required>
                  <option value="" hidden disabled {{ $topic->id ? '' : 'selected' }}>请选择分类</option>
                  @foreach ($categories as $value)
                  <option value="{{ $value->id }}" {{ $topic->category_id == $value->id ? 'selected' : '' }}>
                    {{ $value->name }}
                  </option>
                  @endforeach
                </select>
              </div>

              <div class="mb-3">
                <textarea name="body" hidden id="editor" required>{{ old('body', $topic->body) }}</textarea>
                <div id="editor-wrapper">
                  <div id="toolbar-container"></div>
                  <div id="editor-container"></div>
                </div>
              </div>

              <div class="well well-sm">
                <button type="submit" class="btn btn-primary"><i class="far fa-save me-2" aria-hidden="true"></i>
                  保存</button>
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>

  <x-slot name="scripts">
    <script src="{{ mix('js/topic_form.js') }}" defer></script>
  </x-slot>
</x-app-layout>
