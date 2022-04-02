<x-app-layout>
  <x-auth-card>
    <x-slot name="logo">
      <a href="/" class="text-3xl">
        LaraBBS
      </a>
    </x-slot>

    <div class="mb-4 text-sm text-gray-600">
      忘记密码了？没关系。告诉我们你的邮箱地址，我们会给你发送密码重置链接，这样你就可以选择一个新的密码了。
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('password.email') }}">
      @csrf

      <!-- Email Address -->
      <div>
        <x-label for="email" :value="__('Email')" />

        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
          autofocus />
      </div>

      <div class="flex items-center justify-end mt-4">
        <x-button>
          {{ __('Email Password Reset Link') }}
        </x-button>
      </div>
    </form>
  </x-auth-card>
</x-app-layout>
