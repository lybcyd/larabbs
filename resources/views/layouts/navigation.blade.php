<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 border-t-4 border-t-teal-500 shadow">
  <!-- Primary Navigation Menu -->
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between h-16">
      <div class="flex">
        <!-- Logo -->
        <div class="shrink-0 flex items-center">
          <a href="{{ route('dashboard') }}">
            <p class="text-xl font-semibold text-gray-600">LaraBBS</p>
          </a>
        </div>
      </div>
      @auth
      <!-- Settings Dropdown -->
      <div class="flex items-center ml-6">
        <x-dropdown align="right" width="48">
          <x-slot name="trigger">
            <button
              class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
              <div>
                <img src="https://cdn.learnku.com/uploads/images/201709/20/1/PtDKbASVcz.png?imageView2/1/w/60/h/60"
                  class="inline mr-1 rounded h-8 w-8">
                <span class="align-middle">{{ Auth::user()->name }}</span>
              </div>

              <div class="ml-1">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                    clip-rule="evenodd" />
                </svg>
              </div>
            </button>
          </x-slot>

          <x-slot name="content">
            <x-dropdown-link :href="route('logout')">
              个人中心
            </x-dropdown-link>
            <x-dropdown-link :href="route('logout')">
              编辑资料
            </x-dropdown-link>
            <hr class="my-1">
            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
              @csrf

              <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                {{ __('Log Out') }}
              </x-dropdown-link>
            </form>
          </x-slot>
        </x-dropdown>
      </div>
      @else
      <div class="space-x-8 -my-px flex">
        <x-nav-link :href="route('login')">
          {{ __('Login') }}
        </x-nav-link>
        <x-nav-link :href="route('register')">
          {{ __('Register') }}
        </x-nav-link>
      </div>
      @endauth
    </div>
  </div>
</nav>
