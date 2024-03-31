<div x-data="{ open: false }" class="bg-green-900 text-white">
  <nav class="flex items-center justify-between p-6">
    <div class="flex items-center flex-shrink-0 mr-6">
      <a href="{{ route('dashboard') }}" class="font-semibold text-xl tracking-tight">Home</a>
    </div>
    <div class="block lg:hidden">
      <button @click="open = !open" class="px-3 py-2 border rounded text-green-200 border-green-400 hover:text-white hover:border-white">
        <svg x-show="!open" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
        <svg x-show="open" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
      </button>
    </div>
    <div class="w-full lg:flex lg:items-center lg:w-auto" :class="{'block': open, 'hidden': !open}">
      <div class="text-sm lg:flex-grow">
        <a href="/todo" class="block mt-4 lg:mt-0 lg:inline-block text-green-200 hover:text-white mr-4">Todo</a>
        <a href="/banner" class="block mt-4 lg:mt-0 lg:inline-block text-green-200 hover:text-white mr-4">Banners</a>
      </div>
      <div>
        @auth
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="inline-block mt-4 lg:mt-0 px-4 py-2 leading-none border rounded text-green-200 border-white hover:border-transparent hover:text-green-500 hover:bg-white">Log Out</button>
        </form>
        @endauth
        @guest
        <a href="{{ route('login') }}" class="inline-block mt-4 lg:mt-0 px-4 py-2 leading-none border rounded text-green-200 border-white hover:border-transparent hover:text-green-500 hover:bg-white">Log In</a>
        <a href="{{ route('register') }}" class="inline-block mt-4 lg:mt-0 px-4 py-2 leading-none border rounded text-green-200 border-white hover:border-transparent hover:text-green-500 hover:bg-white">Register</a>
        @endguest
      </div>
    </div>
  </nav>
</div>
