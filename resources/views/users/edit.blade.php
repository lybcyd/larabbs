<x-app-layout>
  <x-slot name='title'>
    编辑{{ $user->name }}的资料
  </x-slot>
  <div class="flex justify-center">
    <div class="w-1/2">
      <div class="flex flex-col border rounded bg-white">
        <div class="py-2 px-4 border-b bg-slate-50">
          <h4 class="text-xl">编辑个人资料</h4>
        </div>
        <div class="grow shrink p-4">
          <form action="{{ route('users.update', $user->id) }}" method="POST" accept-charset="UTF-8">
            @method('PUT')
            @csrf

            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <div class="mb-3">
              <x-label for="name-field">用户名</x-label>
              <x-input class="w-full" type="text" name="name" id="name-field" value="{{ old('name', $user->name) }}" />
            </div>
            <div class="mb-3">
              <x-label for="email-field">邮 箱</x-label>
              <x-input class="w-full" type="text" name="email" id="email-field"
                value="{{ old('email', $user->email) }}" />
            </div>
            <div class="mb-3">
              <x-label for="introduction-field">个人简介</x-label>
              <textarea name="introduction" id="introduction-field"
                class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                rows="3">{{ old('introduction', $user->introduction) }}</textarea>
            </div>
            <div class="well well-sm">
              <x-button type="submit">保存</x-button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
