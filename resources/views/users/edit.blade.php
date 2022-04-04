<x-app-layout>
  <x-slot name='title'>
    编辑{{ $user->name }}的资料
  </x-slot>
  <div class="container">
    <div class="col-md-8 offset-md-2">

      <div class="card">
        <div class="card-header">
          <h4>
            <i class="glyphicon glyphicon-edit"></i> 编辑个人资料
          </h4>
        </div>

        <div class="card-body">
          <form action="{{ route('users.update', $user->id) }}" method="POST" accept-charset="UTF-8"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
              <label for="name-field" class="form-label">用户名</label>
              <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name-field"
                value="{{ old('name', $user->name) }}" />
              @error('name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="mb-3">
              <label for="email-field" class="form-label">邮 箱</label>
              <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" id="email-field"
                value="{{ old('email', $user->email) }}" />
              @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="mb-3">
              <label for="introduction-field" class="form-label">个人简介</label>
              <textarea name="introduction" id="introduction-field"
                class="form-control @error('introduction') is-invalid @enderror"
                rows="3">{{ old('introduction', $user->introduction) }}</textarea>
              @error('introduction')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="mb-4">
              <label for="avatar" class="form-label">用户头像</label>
              <input type="file" name="avatar" class="form-control @error('avatar') is-invalid @enderror" id="avatar">
              @error('avatar')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
              @if($user->avatar)
              <br>
              <img class="img-thumbnail" src="{{ $user->avatar }}" width="200" />
              @endif
            </div>
            <div class="well well-sm">
              <button type="submit" class="btn btn-primary">保存</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
