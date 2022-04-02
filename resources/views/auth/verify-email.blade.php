<x-app-layout>
  <x-auth-card>
    <x-slot name="logo">
      <a href="/" class="text-3xl">
        LaraBBS
      </a>
    </x-slot>

    <div class="mb-4 text-sm text-gray-600">
      感谢注册 LaraBBS！在开始之前，请检查您的邮箱，点击确认邮件中的链接，确认邮箱地址。如果您没有收到邮件，我们将很乐意发送给您另一封。
    </div>

    @if (session('status') == 'verification-link-sent')
    <div class="mb-4 font-medium text-sm text-green-600">
      一封新的验证邮件已经发送到您的邮箱。
    </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
      <form method="POST" action="{{ route('verification.send') }}">
        @csrf

        <div>
          <x-button>
            {{ __('Resend Verification Email') }}
          </x-button>
        </div>
      </form>

      <form method="POST" action="{{ route('logout') }}">
        @csrf

        <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
          {{ __('Log Out') }}
        </button>
      </form>
    </div>
  </x-auth-card>
</x-app-layout>
