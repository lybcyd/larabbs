<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 border-t-4 border-t-teal-500 shadow">
  <!-- Primary Navigation Menu -->
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between h-16">
      <div class="flex">
        <!-- Logo -->
        <div class="shrink-0 flex items-center">
          <a href="{{ route('root') }}">
            <p class="text-xl font-semibold text-gray-600">LaraBBS</p>
          </a>
        </div>
        <div class="ml-10 space-x-8 -my-px flex">
          <x-nav-link :href="route('topics.index')" :active="request()->routeIs('topics.index')">
            话题
          </x-nav-link>
          <x-nav-link :href="route('categories.show', 1)" :active="request()->is('categories/1')">
            分享
          </x-nav-link>
          <x-nav-link :href="route('categories.show', 2)" :active="request()->is('categories/2')">
            教程
          </x-nav-link>
          <x-nav-link :href="route('categories.show', 3)" :active="request()->is('categories/3')">
            问答
          </x-nav-link>
          <x-nav-link :href="route('categories.show', 4)" :active="request()->is('categories/4')">
            公告
          </x-nav-link>
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
                <img src="{{ Auth::user()->avatar }}" class="inline mr-1 rounded h-8 w-8">
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
            <x-dropdown-link :href="route('users.show', Auth::id())">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <span class="align-middle ml-1">个人中心</span>
            </x-dropdown-link>
            <x-dropdown-link :href="route('users.edit', Auth::id())">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
              </svg>
              <span class="align-middle ml-1">编辑资料</span>
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
