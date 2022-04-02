<x-app-layout>
  <x-auth-card>
    <x-slot name="logo">
      <a href="/" class="text-3xl">
        LaraBBS
      </a>
    </x-slot>

    <div class="mb-4 text-sm text-gray-600">
      这是应用的安全区域。继续之前请确认密码。
    </div>

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('password.confirm') }}">
      @csrf

      <!-- Password -->
      <div>
        <x-label for="password" :value="__('Password')" />

        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
          autocomplete="current-password" />
      </div>

      <div class="flex justify-end mt-4">
        <x-button>
          {{ __('Confirm') }}
        </x-button>
      </div>
    </form>
  </x-auth-card>
</x-app-layout>
